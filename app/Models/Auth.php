<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;

    protected $table = "public.user";

    protected $fillable = [
    	'id_user','nama_user','password'
    ];

    public $timestamps = false;
}
