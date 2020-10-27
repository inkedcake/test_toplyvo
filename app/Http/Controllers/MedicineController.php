<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;


class MedicineController extends ApiController
{
 public function __construct(Medicine $model)
 {
     $this->model = $model;
 }
}