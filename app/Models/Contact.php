<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'cmlk_contact';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'title',
        'detail',
        'replaydetail',
        'content',
        'replay_id',
        'updated_by',
        'created_by',
        'status',
    ];
}
?>