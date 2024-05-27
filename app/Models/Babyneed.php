<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use OpenApi\Annotations as OA;


/**
 * class Babyneed.  
 * 
 * @author Bambang <bambang.422023005@civitas.ukrida.ac.id>
 * 
 * @OA\Schema(
 *     description="Babyneed model",
 *     title="Babyneed model",
 *     required={"nama", "size"},
 *     @OA\Xml(
 *         name="Babyneed"
 *      )
 * )
 */
class Babyneed extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $table = 'babyneedseller';
    protected $fillable = [
        'nama',
        'ukuran',
        'price',
        'description',
        'image',
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
