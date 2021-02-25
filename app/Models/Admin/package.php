<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    use HasFactory;
    protected $table = 'package_mast';
    public $timestamps = false;

    protected $guarded = [
        'package_id',
        'package_name',
        'exam_type',
        'subject',
    ];
}
