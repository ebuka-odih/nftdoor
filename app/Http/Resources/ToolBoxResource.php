<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ToolBoxResource extends JsonResource
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
            'title'=>$this->title,
            'featured_image'=>asset('toolbox/'.$this->featured_image),
            'body'=>$this->body,
            'created_at'=>date('d M Y', strtotime($this->created_at)),
        ];
    }
}
