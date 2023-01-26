<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class campBenefit extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $table='camp_benefits';
    protected $primaryKey='id';
    protected $fillable=['camp_id','name'];
}
