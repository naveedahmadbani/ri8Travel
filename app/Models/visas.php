<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visas extends Model
{
    use HasFactory;
    protected $fillable = [
        'visa_name', 'slug', 'visa_type','entry_type','processing_time','description',
        'banner_image', 'tile_img', 'adult_selling_price','child_selling_price','infant_sell_price','document_required',
        'employed_r_d', 'self_employed_r_d', 'studen_r_d','retired_r_d','important_note','flag','faq','status',
    ];
}
