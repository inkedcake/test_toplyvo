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
    public function manufacturer(){
        return $this->hasOne(Manufacturer::class,'id','manufacurer_id');
    }
    public function substance(){
        return $this->hasOne(Substance::class,'id','substance_id');
    }
}