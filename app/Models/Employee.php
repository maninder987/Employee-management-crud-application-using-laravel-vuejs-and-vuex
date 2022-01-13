<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = 'employees_data';

    protected $fillable = [
        'name',
        'department',
        'section',
        'email',
        'status'
    ];
}
