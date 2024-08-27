<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchase extends Model
{
    use HasFactory;

    protected $fillable = ['amount' , 'supplier','data','item_id','invoice_id'];
}
