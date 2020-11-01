<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 31.10.2020
 * Time: 15:37
 */

namespace App\Http\Resources;

use App\Medicine;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'substance' => $this->substance,
            'manufacturer' => $this->manufacturer,
            'price' => $this->price,
        ];
    }
}