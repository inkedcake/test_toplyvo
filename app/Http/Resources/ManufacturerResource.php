<?php
/**
 * Created by PhpStorm.
 * User: InkedCake
 * Date: 31.10.2020
 * Time: 15:37
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}