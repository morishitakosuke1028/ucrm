<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'work',
        'company',
        'content',
        'status',
        'member',
    ];
}
