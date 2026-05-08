<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'img',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
