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

    public function detail(int $id) {

        $entity = $this->model->find($id)->first();

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        return $this->sendResponse($entity, 'OK',200);

    }

    public function update(int $id, Request $request) {

        $entity = $this->model->find($id)->first();

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendResponse(null, 'Updated',204);
    }

    public function delete(int $id) {

        $entity = $this->model->find($id);

        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }

        $entity->delete();

        return $this->sendResponse(null, 'Deleted',204);

    }

    public function create(Request $request) {

        $data = $request->validated();

        $this->model->fill($data)->push();

        return $this->sendResponse(null, 'Created', 201);

    }

}