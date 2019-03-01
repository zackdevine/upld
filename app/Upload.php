<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [ 'fileid', 'userid', 'path' ];
    protected $dates = [ 'deleted_at', 'created_at', 'updated_at' ];

    public function getUrl() {
    	$owner = User::find($this->userid);
    	return "https://{$owner->username}.upld.gg/{$this->fileid}";
    }
}
