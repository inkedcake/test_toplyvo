<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 27.10.2020
 * Time: 19:51
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class ApiController
{
    protected $model;

    public function get(Request $request){
        $limit = (int) $request->get('limit',100);
        $offset = (int) $request->get('offset',0);

        $result = $this->model->limit($limit)->offset($offset)->get();

        $this->sendResponse($result,'OK',200);
    }

    public function detail(int $id=null){

    }

    public function update(int $id){

    }

    public function create(){

    }

    public function delete(int $id){

    }
}