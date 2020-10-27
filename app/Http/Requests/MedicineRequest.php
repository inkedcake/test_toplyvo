<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 28.10.2020
 * Time: 0:24
 */

namespace App\Http\Requests;


class MedicineRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'substance_id'=>'required|int',
            'manufacturer_id'=>'required|int',
            'price' => 'required|float',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name required!',
            'price.required' => 'Price required!',
            'substance_id.required' => 'substance id required!',
            'manufacturer_id.required' => 'manufacturer id required'
        ];
    }

}