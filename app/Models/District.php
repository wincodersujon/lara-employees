<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $primaryKey = 'id';
    protected $fillable = ['dis_name','thana_name', 'created_at', 'updated_at'];

    public function thanas()
    {
        return $this->hasMany(Thana::class);
    }
}
