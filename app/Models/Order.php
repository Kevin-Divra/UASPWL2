<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id_order');
    }

    public function get_order()
    {
        $sql = $this->select(
            'order.*',
            'users.email as buyer_email',
            DB::raw('GROUP_CONCAT(products.title SEPARATOR ", ") as product_names'),
            DB::raw('GROUP_CONCAT(products.price SEPARATOR ", ") as product_prices'),
            DB::raw('GROUP_CONCAT(order_detail.quantity SEPARATOR ", ") as product_quantities'),
            DB::raw('SUM(products.price * order_detail.quantity) as total_transaction')
        )
        ->join('users', 'users.id', '=', 'order.id_user') // Joining with the users table for the email
        ->join('order_detail', 'order_detail.id_order', '=', 'order.id') // Joining order_detail
        ->join('products', 'products.id', '=', 'order_detail.id_product') // Joining products
        ->groupBy(
            'order.id',            // Primary key of the order table
            'users.email',         // Non-aggregated field from users table
            'order.id_user',       // Non-aggregated field from order table
            'order.created_at',    // Non-aggregated field from order table
            'order.updated_at',    // Non-aggregated field from order table
            'order.total_price'    // Non-aggregated field from order table
        );
        return $sql;

        if ($id) {
            // Filter for a specific transaction if an ID is provided
            $sql->where('order.id', $id);
        }
    }
}