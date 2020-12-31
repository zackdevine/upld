<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Domain;
use App\Models\UserUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DomainController extends Controller
{
    public function view (Domain $domain, $file_id)
    {
        if ($file = UserUpload::firstWhere('file_id', $file_id))
        {
            if (Storage::disk('s3')->exists($file->path))
            {
                $content = Storage::disk('s3')->get($file->path);
                $mime_type = Storage::disk('s3')->mimeType($file->path);
                $response = Response::make($content, 200);
                $response->header('Content-Type', $mime_type);
                return $response;
            }
        }
        abort(404);
    }
}
