<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class EmployeeModel extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'id';

    // Mass assignable columns (optional)
    protected $fillable = ['empid', 'empname', 'designation', 'experience', 'status','created_at','updated_at'];



    public function tasks()
    {
        return $this->hasMany(Task::class , 'employee_id');
    }
}
