<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Medicine;
use JWTAuth;
class MedicineController extends Controller
{
    protected $user;
    protected $medicine;

    public function __construct(Medicine $medicine)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->medicine= $medicine;
    }

    public function index()
    {
//        $model = new Medicine();
        dd( $this->medicine->manufacturer()->get([
            'name'
        ]));

        $medicines = $this->medicine->get([
            'id',
            'name',
            'substance_id'=>[
                $this->medicine->substance()->get([
                    'name'
                ])
            ],
            'manufacturer_id'=>[
                $this->medicine->manufacturer()->get([
                    'name'
                ])
            ],
            'price'
            ])->toArray();
        return $medicines;
    }
}