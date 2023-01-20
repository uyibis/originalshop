<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'slug',
        'description',
        'image_name' ,
        'page_title',
        'meta_description',
        'parent_category',
        'visibility'
    ];
}
