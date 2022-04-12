<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NFTListing extends Model
{
    //
    protected $guarded = [];
    protected $appends = ['icons'];

    public function getIconsAttribute()
    {
        if ($this->type == "ETH")
        {
            return asset('img/eth.svg');
        }elseif($this->type == "SOL")
        {
            return asset('img/sol.svg');
        }else{
            return asset('img/bnb.svg');
        }
    }

}
