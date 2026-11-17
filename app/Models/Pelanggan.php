<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


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

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
    }
}
