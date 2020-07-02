<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    protected $fillable = [ 'file_id', 'author', 'path', 'size', 'mime_type' ];
    protected $dates    = [ 'created_at', 'updated_at', 'deleted_at' ];
    protected $appends  = [ 'url', 'size_in_kb' ];

    public function getUrlAttribute ()
    {
        // return Storage::disk('s3')->url($this->path);
        return secure_url("~/{$this->file_id}");
    }

    public function getSizeInKbAttribute ()
    {
        return round($this->size / 1024, 2);
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
