<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Response;

use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    protected $connection = 'mongodb';

    public function responses(): HasMany{
        return $this->hasMany(Response::class);
    }
}
