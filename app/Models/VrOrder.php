<?php

namespace App\Models;



class VrOrder extends CoreModel
{

    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_order';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'status', 'user_id'];

//    public function order()
//    {
//        return $this->hasOne(VrReservations::class, 'id', 'cover_id');
//    }
}
