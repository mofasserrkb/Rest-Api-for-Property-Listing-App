<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable=[
        'propertyname',
        'slug',
        'propertytype',
        'location',
        'bathroom',
        'bedroom',
        'description',
        'price'
    ];
}
