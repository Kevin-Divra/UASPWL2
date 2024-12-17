<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping';

    protected $fillable = [
        'id_payment',
        'status',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    public function get_shipping()
    {
        $sql = $this->select(
            'shipping.*',
            'user_address.street',
            'user_address.city',
            'user_address.post_code',
            'payment.id_order'
        )
        ->join('payment', 'payment.id', '=', 'shipping.id_payment') // Joining with payment
        ->join('users', 'users.id', '=', 'payment.id_user') // Joining with users
        ->join('user_address', 'user_address.id_user', '=', 'users.id'); // Joining with user_address
        return $sql;
    }


}
