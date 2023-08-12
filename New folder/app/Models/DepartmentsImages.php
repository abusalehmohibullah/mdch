<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentsImages extends Model
{
    use HasFactory;
    protected $table = 'departments_images';
    public function departments()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }
}
