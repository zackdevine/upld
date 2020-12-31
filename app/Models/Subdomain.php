<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdomain extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'subdomain' ];

    public function owner ()
    {
        return $this->hasOne(User::class);
    }
}
