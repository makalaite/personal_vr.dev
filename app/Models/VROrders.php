<?php

namespace App\Models;


class VROrders extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_orders';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id', 'order_status', 'user_id'];

}
