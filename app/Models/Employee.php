<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'email', 'address', 'phone', 'position', 'department_id'];
    public function department()
    {
        return $this->belongsTo(Departement::class, 'department_id');
    }
}
