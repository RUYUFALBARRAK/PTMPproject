<?php

namespace App\Http\Controllers;

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
        $dirpath = 'app/public/docs';
        $filepath = storage_path($dirpath);
        $file->move($filepath, $filename);
        $doc = new document();
        $doc->documentName = $file->getClientOriginalName();
        $doc->document = $dirpath.'/'.$filename;
        $doc->uploaded_for = $inputs['doc_to'];
        try {
            $doc->unit_id = auth()->user()->trainee_id;
        } catch () {
            $doc->unit_id = null;
        }
        if($doc->save()) {
            return response()->json([
                'success' => true,
                'message' => 'File uploaded & saved successfully.',
                'theme' => 'success',
            ], 400);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error while saving.',
                'theme' => 'danger',
            ], 400);
        }
    }

}
