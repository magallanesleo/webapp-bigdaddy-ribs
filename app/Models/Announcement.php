<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'sub_header',
        'description',
        'image',
    ];

    // public function announcement(){
    //     return $this->belongTo(Announcement::class);
    // }

}
