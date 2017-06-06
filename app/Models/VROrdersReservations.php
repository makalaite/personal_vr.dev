<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VROrdersReservations extends Model
{
    public $updated_at = false;
    /**
     * Table name
     * @var string
     */
    protected $table = 'vr_orders_reservations';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['datetime', 'order_id', 'page_experience_id'];
}
