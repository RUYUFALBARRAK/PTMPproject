<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\document;
use Illuminate\Http\Request;
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
        $filename = Str::random(32).'.'.$file->guessClientExtension();
        $dirpath = 'docs';
        $filepath = public_path($dirpath);
        $file->move($filepath, $filename);
        $doc = new document();
        $doc->documentName = $file->getClientOriginalName();
        $doc->document = $filename;
        $doc->uploaded_for = $inputs['doc_to'];
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

}
