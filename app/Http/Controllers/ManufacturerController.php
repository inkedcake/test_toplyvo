<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Medicine;

class ManufacturerController extends Controller
{
    protected $model;

    public function __construct(Manufacturer $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $manufacturer = $this->model->get([
            'id',
            'name',
        ])->toArray();
        return $manufacturer;
    }
}