<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'Portofolio_1193';
    protected $primaryKey = 'portofolio_id';

    protected $fillable = [
        'nama_lengkap',
        'job_title',
        'email',
        'telepon',
        'alamat',
        'about_me',
        'skills',
        'pengalaman',
        'foto',
    ];
}
