<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\document;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BalqeesController extends Controller
{

    public function uploadDoc(Request $request)
    {
        $inputs = Validator::make($request->only(['uploudedfile', 'doc_to']), [
            'uploudedfile' => ['required', 'file', 'mimes:docx,pdf,doc', 'max:16384'],
            'doc_to' => ['required', 'string'],
        ]);
        if ($inputs->fails()) {
            return response()->json([
               'success' => false,
                'message' => collect($inputs->errors())->mapWithKeys(function($err) {
                    return $err;
                }),
                'theme' => 'danger',
            ], 400);
        }
        $inputs = $inputs->getData();
        if (!$request->file('uploudedfile')) {
            return response()->json([
                'success' => false,
                'message' => 'Please upload the file.',
                'theme' => 'danger',
            ], 400);
        }
        $file = $request->file('uploudedfile');
        $currentFileSize = $file->getSize();
        $currentFileName = $file->getClientOriginalName();
        $documentFromNameAndSize = document::where([['size', '=', $currentFileSize], ['documentName', '=', $currentFileName]])->first();
        if($documentFromNameAndSize) {
            return response()->json([
                'success' => false,
                'message' => 'Document already exist.',
                'theme' => 'danger',
            ], 400);
        }
        $filename = Str::random(32).'.'.$file->guessClientExtension();
        $dirpath = 'docs';
        $filepath = public_path($dirpath);
        $file->move($filepath, $filename);
        $doc = new document();
        $doc->documentName = $currentFileName;
        $doc->document = $filename;
        $doc->uploaded_for = $inputs['doc_to'];
        $doc->size = $currentFileSize;
        try {
            $doc->unit_id = auth()->user()->trainee_id;
        } catch (\Throwable $th) {
            $doc->unit_id = null;
        }
        if($doc->save()) {
            return response()->json([
                'success' => true,
                'message' => 'File uploaded & saved successfully.',
                'theme' => 'success',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error while saving.',
                'theme' => 'danger',
            ], 400);
        }
    }

    public function deleteDoc(Request $request) {
        $doc_id = $request->only(['doc_id']);
        $doc = document::find($doc_id['doc_id']);
        $doc_path = public_path($doc->documentPath());
        if(document::destroy($doc_id)) {
            if(file_exists($doc_path)) {
                if(unlink($doc_path)) {
                    return redirect(route('training_doc'))->with('status', 'File Deleted Successfully')->with('theme', 'success');
                } else {
                    return redirect(route('training_doc'))->with('status', 'file deleted from the database but cannot delete the file itself')->with('theme', 'warning');
                }
            } else {
                return redirect(route('training_doc'))->with('status', 'file deleted from the database but the file doesnt exist to delete')->with('theme', 'warning');
            }
        }
        return redirect(route('training_doc'))->with('status', 'Error deleting file')->with('theme', 'danger');
    }

    public function deleteAnnouncement(Request $request) {
        $announcement_id = $request->only(['announcement_id'])['announcement_id'];
        if(announcement::destroy($announcement_id)) {
            return redirect(route('announcements'))->with('status', 'Announcement Deleted Successfully')->with('theme', 'success');
        }
        return redirect(route('announcements'))->with('status', 'Error Deleting Announcement')->with('theme', 'danger');
    }

    public function addAnnouncement(Request $request) {
        $inputs = Validator::make($request->only(['title', 'content']), [
            'title' => ['required', 'string', 'max:40'],
            'content' => ['required', 'string', 'max:500'],
        ]);
        if ($inputs->fails()) {
            return redirect(route('add_announcement'))->with('status', 'Please fill all fields.')->with('theme', 'danger')->withErrors($inputs)->withInput();
        }
        $inputs = $inputs->getData();
        $announcement = new announcement();
        $announcement->title = $inputs['title'];
        $announcement->content = $inputs['content'];
        if($announcement->save()) {
            return redirect(route('announcements'))->with('status', 'Announcement Added Successfully.')->with('theme', 'success');
        } else {
            return redirect(route('add_announcement'))->with('status', 'Error: cannot add announcement.')->with('theme', 'danger')->withInput();
        }
    }

    public function editAnnouncement(Request $request, announcement $announcement) {
        $inputs = Validator::make($request->only(['title', 'content']), [
            'title' => ['required', 'string', 'max:40'],
            'content' => ['required', 'string', 'max:500'],
        ]);
        if ($inputs->fails()) {
            return redirect(route('edit_announcement', ['announcement' => $announcement]))->with('status', 'Please fill all fields.')->with('theme', 'danger')->withErrors($inputs)->withInput();
        }
        $inputs = $inputs->getData();
        $announcement->title = $inputs['title'];
        $announcement->content = $inputs['content'];
        if($announcement->save()) {
            return redirect(route('announcements'))->with('status', 'The Announcement is Updated Successfully.')->with('theme', 'success');
        } else {
            return redirect(route('edit_announcement', ['announcement' => $announcement]))->with('status', 'Error: cannot update the announcement.')->with('theme', 'danger')->withInput();
        }
    }

    public function forgetPassword(Request $request) {
        //get inputs
        //validate inputs
        //check email exist
        //create token and save it in password_resets table
        //send link with token to email

        $inputs = Validator::make($request->only(['email', 'confirm_email']), [
            'email' => ['required', 'email'],
            'confirm_email' => ['required', 'same:email'],
        ]);
        if ($inputs->fails()) {
            return redirect(route('forget_password'))->with('status', 'Please solve the errors.')->with('theme', 'danger')->withErrors($inputs)->withInput();
        }
        $inputs = $inputs->getData();
        $email = $inputs['email'];
        $account = DB::table('company')->where('orgnizationEmail', '=', $email)->first();
        if($account) {
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            try {
                Mail::send('email.change_password', ['token' => $token], function($message) use($email) {
                    $message->to($email);
                    $message->subject('Change your Password');
                });
                return redirect(route('forget_password'))->with('status', 'Instructions to change your password has been sent to your email.')->with('theme', 'success');
            } catch (\Throwable $th) {
                return redirect(route('forget_password'))->with('status', 'An error occurred while sending your email. Please contact the site admin to configure the mail.')->with('theme', 'danger')->withInput();
            }
        } else {
            return redirect(route('forget_password'))->with('status', 'Email does not exist.')->with('theme', 'danger')->withInput();
        }
    }

}
