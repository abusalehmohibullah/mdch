<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;
    public function departments()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }
}