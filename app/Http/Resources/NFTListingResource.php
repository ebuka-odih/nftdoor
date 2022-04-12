<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NFTListingResource extends JsonResource
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
            'featured_image'=>asset('nft-images/'.$this->featured_image),
            'price'=>$this->price,
            'description'=>$this->description,
            'images'=>asset('nft-images/'.$this->images),
            'profit'=>$this->profit,
            'supply'=>$this->supply,
            'network'=>$this->network,
            'pre_sale'=>$this->pre_sale,

            'change24'=>$this->change24,
            'floor_price'=>$this->floor_price,
            'owners'=>$this->owners,
            'asset'=>$this->asset,
            'icons'=>$this->icons,


        ];
    }
}
