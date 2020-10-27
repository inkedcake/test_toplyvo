<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Manufacturer;

class ManufacturerController extends ApiController
{
 public function __construct(Manufacturer $model)
 {
     $this->model = $model;
 }
}