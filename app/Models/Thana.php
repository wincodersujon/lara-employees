<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Thana extends Model
{
    use HasFactory;
    protected $table = 'thanas';
    protected $primaryKey = 'id';
    protected $fillable = ['thana_name', 'district_id', 'created_at', 'updated_at'];
    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
