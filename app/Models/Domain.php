<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'domain' ];

    public function owner ()
    {
        return $this->hasOne(User::class);
    }
}
