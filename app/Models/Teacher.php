<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_number', 'name', 'email', 'password', 'phone', 'specialization', 'hire_date'
    ];

    public function getAuthIdentifierName()
    {
        return 'user_number';
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'teacher_id');
    }
}
