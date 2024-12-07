<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Jika Anda ingin menentukan kolom yang dapat diisi, Anda bisa menggunakan protected $fillable
    // Atau jika ingin melindungi kolom dari perubahan mass-assignment, gunakan protected $guarded
    protected $guarded = [];

    // Jika Anda ingin menambahkan kolom kunci yang lain selain 'id', seperti 'username', Anda bisa menambahkannya
    // protected $primaryKey = 'username'; 

    // Jika Anda ingin mengubah kolom yang digunakan untuk email dan password, Anda bisa menambahkannya
    // protected $username = 'email';


    protected $table = 'admins'; // Pastikan ini sesuai dengan nama tabel Anda di database
}
