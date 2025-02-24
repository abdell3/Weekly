<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    /** @use HasFactory<\Database\Factories\AnnouncementFactory> */
    use HasFactory;

    protected $fillable = ['titre', 'description', 'slug', 'prix', 'image', 'status'];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}





