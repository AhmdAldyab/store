<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

class item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','number_code','section_id',
        'price_sell','date','number_place',
        'price_pay','quantity','unit',
        'status','activate'
    ];

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    }
}
