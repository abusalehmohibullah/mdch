<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by', 'status'];

    public function media()
    {
        return $this->hasMany(Media::class, 'album_id');
    }
    
}
