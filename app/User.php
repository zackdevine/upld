<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [ 'username', 'userid', 'discrim', 'avatar', 'access_token', 'api_key' ];
    protected $hidden = [ 'access_token', 'remember_token', 'api_key' ];
    
    public function getDisplayName() { return "{$this->username}#{$this->discrim}"; }

    public function images()
    {
        return $this->hasMany(Image::class, 'author')->latest();
    }

    public function getConfig ($type = 'sharex')
    {
        $appurl = env('APP_BASE_URL');
        switch ($type)
        {
            case 'sharex':
                $config = json_encode([
                    'Version'           => '12.4.1',
                    'Name'              => config('app.name'),
                    'DestinationType'   => 'ImageUploader',
                    'RequestMethod'     => 'POST',
                    'RequestUrl'        => secure_url('api/upload'),
                    'Body'              => 'MultipartFormData',
                    'FileFormName'      => 'file',
                    'Arguments'         => [ 'apikey' => $this->api_key ],
                    'ResponseType'      => 'Text',
                    'URL'               => '$json:url$'
                ]);
                $filename = "{$this->username}.{$appurl}.sxcu";
                Storage::put($filename, $config);
                return Storage::download($filename);
        }
    }
}
