<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Substance extends Model
{
    protected $table = 'substance';

    protected $fillable = [
        'name',
    ];

    protected $visible = [
        'id',
        'name',
    ];
}