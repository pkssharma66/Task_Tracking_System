<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks'; // table name in DB

    protected $fillable = [
        'employee_id',
        'title',
        'description',
        'status',
        'started_at',
        'ended_at',
        'due_date',
    ];

    // Relationship: Task belongs to an Employee
    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }
}