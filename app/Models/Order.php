<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'status',
        'message',
        'tracking_no',
    ];
	
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

	
}

