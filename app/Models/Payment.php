<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'payment';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'id_user',
        'id_order',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
    public function get_payment()
    {
        $sql = $this->select(
            'payment.*',
            'order.total_price',
            'users.name',
            DB::raw('GROUP_CONCAT(products.title SEPARATOR ", ") as product_names'),
            DB::raw('GROUP_CONCAT(products.price SEPARATOR ", ") as product_prices'),
            DB::raw('GROUP_CONCAT(order_detail.quantity SEPARATOR ", ") as product_quantities'),
            DB::raw('SUM(products.price * order_detail.quantity) as total_transaction')
        )
        ->join('users', 'users.id', '=', 'payment.id_user') // Joining with the users table for the email
        ->join('order', 'order.id', '=', 'payment.id_order') // Joining with the orders table
        ->join('order_detail', 'order_detail.id_order', '=', 'order.id') // Joining order_detail
        ->join('products', 'products.id', '=', 'order_detail.id_product') // Joining products
        ->groupBy(
            'payment.id',            // Primary key of the payment table
            'payment.id_user',       // Non-aggregated field from payment table (user ID)
            'payment.id_order',      // Non-aggregated field from payment table (order ID)
            'payment.status',        // Non-aggregated field from payment table
            'payment.created_at',    // Non-aggregated field from payment table
            'payment.updated_at',    // Non-aggregated field from payment table
            'users.name',    // Non-aggregated field from payment table
            'order.total_price'      // Non-aggregated field from order table

        );
        return $sql;

        if ($id) {
            // Filter for a specific transaction if an ID is provided
            $sql->where('payment.id', $id);
        }
    }

}