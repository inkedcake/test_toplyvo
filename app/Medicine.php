<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicine';

    protected $fillable = [
        'name',
        'substance_id',
        'manufacturer_id',
        'price',
    ];

    protected $visible = [
        'name',
        'substance_id',
        'manufacturer_id',
        'price',
    ];
}