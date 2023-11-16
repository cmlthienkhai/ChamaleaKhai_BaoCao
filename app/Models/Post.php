<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'cmlk_post';
     public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
?>