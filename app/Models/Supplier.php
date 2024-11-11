<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat_supplier',
        'supplier_name',
        'no_hp_pic_supplier',
        'pic_supplier',
    ];

    public function get_supplier()
    {
        return $this->select("suppliers.*");
    }

    public static function storeSupplier($request)
    {
        return self::create([
            'alamat_supplier'     => $request->alamat_supplier,
            'supplier_name'       => $request->supplier_name,
            'no_hp_pic_supplier'  => $request->no_hp_pic_supplier,
            'pic_supplier'        => $request->pic_supplier,    
        ]);
    }
}
