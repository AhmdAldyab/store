<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sells extends Model
{
    use HasFactory;

    protected $fillable = ['amount' , 'payer','date','item_id'];
    public function item(){
        return $this->belongsTo(item::class,'item_id');
    }

}
