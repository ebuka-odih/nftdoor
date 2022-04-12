<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NFTGiveawayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'featured_image'=>asset('nft-giveaway/'.$this->featured_image),
            'body'=>$this->body,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'ends_in' =>$this->ends_in,
            'is_ended' =>$this->is_ended,
        ];

    }
}
