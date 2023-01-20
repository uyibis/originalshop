<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable=[
        'path',
        'associate',
        'associate_id'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ImageInfo::class);
        //Or: return $this->hasMany(Post::class, 'foreign_key');
    }
}
