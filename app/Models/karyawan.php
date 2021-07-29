<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nomor_ktp';

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'nomor_ktp', 'nomor_ktp');
    }
    
    public function experience()
    {
        return $this->hasMany(Experience::class, 'nomor_ktp', 'nomor_ktp');
    }
}
