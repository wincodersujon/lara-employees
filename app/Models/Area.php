<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $primaryKey = 'id';
    protected $fillable = ['dis_name' , 'thana_name' ,'name', 'email', 'age','department', 'designation', 'area_id', 'created_at', 'updated_at'];

    public function employees()
    {
        return $this->hasMany(employees::class);
    }

    public function thana()
    {
        return $this->belongsTo(thana::class);
    }
}
