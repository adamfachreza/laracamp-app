<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class camp extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['created_at', 'updated_at','deleted_at'];
    protected $table='camps';
    protected $primaryKey='id';
    protected $fillable=['title','slug','price'];

    public function getIsRegisteredAttribute(){
        if(!Auth::check()){
            return false;
        }
        return checkout::whereCampId($this->id)->whereUserId(Auth::id())->exists();
    }
}
