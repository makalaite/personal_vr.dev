<?php

namespace App\Models;



class VrReservations extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'vr_reservations';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'experience_id', 'order_id', 'time'];
}
