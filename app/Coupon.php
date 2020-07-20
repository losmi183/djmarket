<?php

namespace App;

use App\Coupon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code) 
    {
        return self::where('code', $code)->first();
    }


    public function discount($total) 
    {
        if($this->type == 'fixed')
        {
            return $this->value;
        }
        elseif($this->type == 'percent')
        {
            return round($total * ($this->percent_off / 100));
        }
        else {
            return 0;
        }
    }

}
