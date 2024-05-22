<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;

class Babyneed extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $table = 'babyneeds';
    protected $fillable = [
        'id',
        'nama_item_baby',
        'ukuran',
        'price',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];
    public function data_adder(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
