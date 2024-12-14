<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'created_at',
        'updated_at',
    ];
}
