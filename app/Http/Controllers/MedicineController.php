<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:55
 */

namespace App\Http\Controllers;

use App\Medicine;
use App\Substance;
use Illuminate\Http\Request;
use JWTAuth;

class MedicineController extends Controller
{
    protected $user;
    protected $medicine;
    protected $substance;

    public function __construct(Medicine $medicine)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->medicine = $medicine;
        $this->substance = $medicine->substance();
    }

    public function index()
    {
//        $model = new Medicine();

        $medicines = $this->medicine->get([
            'id',
            'name',
            'substance_id',
            'manufacturer_id',
            'price'
        ])->toArray();
        return $medicines;
    }

    public function show(Medicine $medicine){
        if ($medicine){
           return response()->json([
               "status"=>true,
               "medicine"=>$medicine
           ]);
       }else{
           return response()->json([
               "status"=>false,
               "message"=>"Ops, the medicine can not be find"
           ],500);
       }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "substance_id" => "required",
            "manufacturer_id" => "required",
            "price" => "required",
        ]);

        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->substance_id = $request->substance_id;
        $medicine->manufacturer_id = $request->manufacturer_id;
        $medicine->price = $request->price;

        if ($medicine->save($medicine->attributesToArray())){
            return response()->json([
                "status"=>true,
                "medicine"=>$medicine
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Ops, the medicine can not be created"
            ],500);        }

    }

    public function update(Request $request, Medicine $medicine)
    {
//        dd($request->all());
        $this->validate($request, [
            "name" => "required",
            "substance_id" => "required",
            "manufacturer_id" => "required",
            "price" => "required",
        ]);

        if ($medicine->update($request->all())){
            return response()->json([
                "status"=>true,
                "medicine"=>$medicine
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Ops, the medicine can not be updated"
            ],500);        }
    }

    public function destroy(Medicine $medicine){
            if ($medicine->delete()){
            return response()->json([
                "status"=>true,
                "medicine"=>$medicine
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Ops, the medicine can not be deleted"
            ],500);
            }

    }
}