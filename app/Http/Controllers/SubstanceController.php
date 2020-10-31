<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Substance;

class SubstanceController extends Controller
{
    protected $model;

    public function __construct(Substance $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $substance = $this->model->get([
            'id',
            'name',
        ])->toArray();
        return $substance;
    }
}