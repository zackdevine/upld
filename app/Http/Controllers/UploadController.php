<?php

namespace App\Http\Controllers;

use App\Upload;
use App\User;
use App\Http\Requests\StoreImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
            if ($filepath = $request->file('file')->storePublicly("uploads/{$user->userid}", 's3'))
            {
                $request->merge([
                    'size'  => $request->file('file')->getClientSize(),
                    'path'  => $filepath,
                    'mime'  => $request->file('file')->getMimeType()
                ]);

                if ($upload = Upload::create([
                    'file_id'   => $this->getNextFileID(),
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

    public function doDiscordUpload (Request $request)
    {
        if (!$request->userid) return "Invalid user ID specified.";
        if ($user = User::where('userid', $request->userid)->first())
        {
            switch ($request->type)
            {
                case 'attachment':
                    $img_info = pathinfo($request->content);
                    $img_contents = file_get_contents($request->content);
                    $file = public_path('temp') . $img_info['basename'];
                    file_put_contents($file, $img_contents);
                    $uploaded_file = new UploadedFile($file, $img_info['basename']);
                    if ($filepath = $uploaded_file->storePublicly("uploads/{$user->userid}", 's3'))
                    {
                        $request->merge([
                            'size'  => $uploaded_file->getClientSize(),
                            'path'  => $filepath,
                            'mime'  => $uploaded_file->getMimeType()
                        ]);

                        if ($upload = Upload::create([
                            'file_id'   => $this->getNextFileID(),
                            'author'    => $user->id,
                            'path'      => $request->path,
                            'size'      => $request->size,
                            'mime_type' => $request->mime
                        ]))
                        {
                            return response()->json(['status' => 200, 'message' => "Snipped! {$upload->url}"]);
                        }
                        else
                        {
                            return response()->json([
                                'status' => 500,
                                'message' => 'There was an issue uploading your file. Please try again.'
                            ]);
                        }
                    }
                    else
                    {
                        return response()->json([
                            'status' => 500,
                            'message' => 'There was an issue uploading your file. Please try again.'
                        ]);
                    }

                case 'text':
                    $filename = Str::uuid();
                    $file = public_path("temp/{$filename}");
                    file_put_contents($file, $request->content);
                    $uploaded_file = new UploadedFile($file, $filename);
                    if ($filepath = $uploaded_file->storePublicly("uploads/{$user->userid}", 's3'))
                    {
                        $request->merge([
                            'size'  => $uploaded_file->getClientSize(),
                            'path'  => $filepath,
                            'mime'  => $uploaded_file->getMimeType()
                        ]);

                        if ($upload = Upload::create([
                            'file_id'   => $this->getNextFileID(),
                            'author'    => $user->id,
                            'path'      => $request->path,
                            'size'      => $request->size,
                            'mime_type' => $request->mime
                        ]))
                        {
                            return response()->json(['status' => 200, 'message' => "Snipped! {$upload->url}"]);
                        }
                        else
                        {
                            return response()->json([
                                'status' => 500,
                                'message' => 'There was an issue uploading your file. Please try again.'
                            ]);
                        }
                    }
                    else
                    {
                        return response()->json([
                            'status' => 500,
                            'message' => 'There was an issue uploading your file. Please try again.'
                        ]);
                    }
            }
        }
        else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Your account does not exist! Please first login to <' . env('APP_URL') . '> and then try again.'
            ]);
        }
    }

    private function getNextFileID()
    {
        $fileid = Str::random(12);
        while (!is_null(Upload::where('file_id', $fileid)->first()))
        { $fileid = Str::random(12); }
        return $fileid;
    }
}
