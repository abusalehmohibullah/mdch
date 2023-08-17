<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    public function faculties()
    {
        return $this->hasMany(Faculties::class, 'department_id');
    }
    public function departmentsImages()
    {
        return $this->hasMany(DepartmentsImages::class, 'department_id');
    }
}
