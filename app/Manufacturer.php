<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Manufacturer extends Model
{
    protected $table = 'manufacturer';

    protected $fillable = [
        'name',
    ];

    protected $visible = [
        'id',
        'name',
    ];
}