<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class UserUpload extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'user_id', 'file_id', 'path', 'mime_type', 'size' ];

    public function getUrlAttribute ()
    {
        return Storage::disk('s3')->url($this->path);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
