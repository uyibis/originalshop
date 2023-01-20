<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prod extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
        ,'slug'
        ,'description'
        ,'short_description'
        ,'images'
        ,'price'
        ,'sale_price'
        ,'page_title'
        ,'meta_description'
        ,'visibility'
        ,'categories'
        ,'verified'
        ,'brand'
        ,'manufacturer'
        ,'tags'
        ,'myear'
        ,'category_id'
        ,'user_id'
    ];
}
