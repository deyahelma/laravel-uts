<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosenmodel extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = ['nama', 'nidn', 'bidang'];
    public $timestamps = false;
}
