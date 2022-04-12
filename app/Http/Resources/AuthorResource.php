<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'country'=>$this->country,
            'email'=>$this->email,
            'confirm_payment'=>$this->confirm_payment
        ];
    }

}
