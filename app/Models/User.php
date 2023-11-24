<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model
{
    protected $connection = 'mongodb';

}
