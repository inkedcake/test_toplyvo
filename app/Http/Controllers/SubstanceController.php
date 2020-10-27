<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Substance;

class SubstanceController extends ApiController
{
 public function __construct(Substance $model)
 {
     $this->model = $model;
 }
}