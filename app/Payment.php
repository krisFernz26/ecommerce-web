<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    public $timestamps = false;

    public function payment_type(){
        return $this->hasOne('App\PaymentType', 'payment_type_id');
    }

    public function order(){
        return $this->belongsTo('\App\Order', 'order_id');
    }
}