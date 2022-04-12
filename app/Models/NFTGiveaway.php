<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NFTGiveaway extends Model
{
    protected $guarded = [];

    protected $appends = ['ends_in', 'is_ended'];

    public function getEndsInAttribute()
    {
        $start = Carbon::parse($this->start_date);
        $diff = $start->diffInDays($this->end_date);
        if ($diff > 1){
            return "Ends in $diff day(s)";
        }
        return "Ends in $diff day";

    }

    public function getIsEndedAttribute()
    {
        $end_date = Carbon::parse($this->end_date);
        return Carbon::now()->greaterThan($end_date);
    }





}

