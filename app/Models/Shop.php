<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['map_id', 'name','cat_id','grid_id', 'x_coordinate', 'y_coordinate'];
}
