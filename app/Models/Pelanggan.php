<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table        = 'pelanggan'; //model ini terhubung dengan tabel database yang bernama pelanggan
    protected $primaryKey   = 'pelanggan_id'; //Menentukan kolom mana yang bertindak sebagai Primary Key
    protected $fillable     = [ //Menentukan kolom mana saja yang boleh diisi secara massal (mass assignment)
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}

