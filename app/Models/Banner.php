<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';
    public $guarded=[];
     protected $fillable = [
         'title',
         'description',
         'image_path',
         'button_text',
         'button_link',
     ];
}
