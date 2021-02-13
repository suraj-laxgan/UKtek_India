<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    use HasFactory;
    protected $table = 'study_material_mast';
    public $timestamps = false;

    protected $guarded = [
        'study_material_id',
        'creator_name',
        'f_name',
        'select_type',
        'short_description',
        'grade', 
    ];
}
