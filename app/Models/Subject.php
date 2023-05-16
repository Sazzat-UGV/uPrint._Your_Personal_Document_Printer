<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];

    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id','id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
