<?php

namespace App\Http\Controllers;

use App\Upload;
use App\User;
use App\Http\Requests\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function getUploads ()
    {
        return view('user.uploads')->with('uploads', auth()->user()->uploads);
    }

    public function doUpload (Request $request)
    {
        if (!$request->apikey) abort(401);
        if ($user = User::where('api_key', $request->apikey)->first())
        {
            // get random file_id
            $fileid = Str::random(12);
            while (!is_null(Upload::where('file_id', $fileid)->first()))
            { $fileid = Str::random(12); }

            if ($filepath = $request->file('file')->storePublicly("uploads/{$user->userid}", 's3'))
            {
                $request->merge([
                    'size'  => $request->file('file')->getClientSize(),
                    'path'  => $filepath,
                    'mime'  => $request->file('file')->getMimeType()
                ]);

                if ($upload = Upload::create([
                    'file_id'   => $fileid,
                    'author'    => $user->id,
                    'path'      => $request->path,
                    'size'      => $request->size,
                    'mime_type' => $request->mime
                ]))
                {
                    return response()->json(['status' => 200, 'url' => $upload->url]);
                }
                else return abort(404);
            }
            else return abort(403);
        }
        else return abort(401);
    }

    public function getUpload ($fileid)
    {
        if ($file = Upload::where('file_id', $fileid)->first())
        {
            return response(Storage::disk('s3')->get($file->path))->header('Content-Type', $file->mime_type);
        }
        else return response()->file('img/upld_404.png');
    }
}
