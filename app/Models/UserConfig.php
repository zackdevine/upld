<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Jenssegers\Model\Model;

class UserConfig extends Model
{
    
    public static function getShareX(User $user)
    {
        $config = json_encode([
            'Version'           => '12.4.1',
            'Name'              => config('app.name'),
            'DestinationType'   => 'ImageUploader',
            'RequestMethod'     => 'POST',
            'RequestUrl'        => secure_url('api/upload'),
            'Body'              => 'MultipartFormData',
            'FileFormName'      => 'file',
            'Headers'           => [
                'Authorization' => "Bearer $user->api_token"
            ],
            'ResponseType'      => 'Text',
            'URL'               => '$json:url$'
        ]);

        $appurl = env('APP_BASE_URL');
        $filename = "$user->user_id.$appurl";
        Storage::put($filename, $config);
        return Storage::download($filename, "$filename.sxcu");
    }

}
