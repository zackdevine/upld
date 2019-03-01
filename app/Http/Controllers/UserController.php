<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
    public function __construct () {
    	$this->middleware('auth')->except('getFile');
    }

    public function index () {
    	return view('user.profile');
    }

    public function choosePlan () {
    	return view('user.choose-plan');
    }

    public function getFile ($username, $file) {
    	$user = User::where('username', $username)->first();
    	$file = Upload::where('fileid', $file)->where('userid', $user->id)->first();
    	if (!$user || !$file || !Storage::disk('s3')->exists($file->path)) abort(404);
    	$image = Storage::disk('s3')->get($file->path);
    	return response($image)->header('Content-Type', 'image/jpeg');
    }

    public function downloadProfile ($type) {
    	$user = Auth::user();
    	if ($type == "sharex")
    	{
    		$config = json_encode([
	            "Version" => "12.4.1",
	            "Name" => "upld.gg",
	            "Body" => "MultipartFormData",
	            "DestinationType" => "ImageUploader",
	            "RequestType" => "POST",
	            "RequestURL" => url("/upload"),
	            "FileFormName" => "image",
	            "Arguments" => [
	                "apikey" => "{$user->apikey}"
	            ],
	            "ResponseType" => "Text",
	            "URL" => '$json:url$'
	        ]);
	        $filename = "{$user->username}.upld.gg.sxcu";
	        Storage::put($filename, $config);
	        return Storage::download($filename);
    	}
    }
}
