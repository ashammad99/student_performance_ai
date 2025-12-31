<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parnet extends Authenticatable
{
    use HasFactory;
    protected $table = 'parnets';
    protected $fillable = [
        'user_number','name','email', 'password', 'phone', 'relation',
    ];

    public function getAuthIdentifierName()
    {
        return 'user_number';
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }


}
