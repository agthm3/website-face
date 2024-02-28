<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function iot(){
        return $this->belongsTo(Iot::class);
    }

    protected $fillable = ['iot_id', 'user_id', 'status', 'created_at', 'updated_at'];

}
