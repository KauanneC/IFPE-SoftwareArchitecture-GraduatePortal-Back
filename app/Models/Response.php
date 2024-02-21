<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Form;

use MongoDB\Laravel\Eloquent\Model;

class Response extends Model
{
    protected $connection = 'mongodb';

    public function form(): BelongsTo{
        return $this->belongsTo(Form::class);
    }

}
