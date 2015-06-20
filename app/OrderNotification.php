<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderNotification extends Model
{
    protected $table = 'order_notification';
    protected $fillable = ['id', 'notification', 'order_id'];
}
