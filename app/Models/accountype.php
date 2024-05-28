<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class accountype extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['AccTypeName'];


    public $timestamps = true;
    protected $fillable = [

        'AccTypeName',
        'AccTypeDesc',
        'AccTypeStatus',
    ];
}
