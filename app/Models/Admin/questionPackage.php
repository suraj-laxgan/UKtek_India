<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionPackage extends Model
{
    use HasFactory;
    protected $table = 'package_question_mast';
    public $timestamps = false;
}
