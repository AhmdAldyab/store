<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['quantity','user_id','item_id'];

    public function item()
    {
        return $this->belongsTo(item::class,'item_id');
    }
}
