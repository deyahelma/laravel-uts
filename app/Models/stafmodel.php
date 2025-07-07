<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stafmodel extends Model
{
    use HasFactory;
    protected $table = 'staf';
    protected $fillable = ['nik', 'nama', 'jabatan'];
    public $timestamps = false;
}
