<?php

namespace App\Http\Controllers;

use App\Upload;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function __construct () {

    }

    public function doUpload (Request $request) {
    	if (!$request->apikey) abort(401);
    	$user = User::where('apikey', $request->apikey)->first();
    	if (!$user) abort(401);
    	$filepath = $request->image->storePublicly('uploads', 's3');
    	if ($filepath)
    	{
    		$upload = Upload::create([
    			'fileid' => Str::random(10),
    			'userid' => $user->id,
    			'path' => $filepath
    		]);
    		return response()->json(["status" => 200, "url" => $upload->getUrl()]);
    	}
    	else abort(404);
    }
}
