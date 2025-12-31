<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_number', 'name','email', 'password', 'age', 'gender', 'grade','teacher_id','parent_id'
    ];

    public function getAuthIdentifierName()
    {
        return 'user_number';
    }

    public function parent()
    {
        return $this->belongsTo(Parnet::class, 'parent_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
