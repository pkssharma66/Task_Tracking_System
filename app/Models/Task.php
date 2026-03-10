<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Task extends Model
    {
        protected $table = 'task'; // table name in DB

        protected $fillable = [
            'employee_id',
            'title',
            'description',
            'status',
            'started_at',
            'ended_at',
            'due_date',
        ];

        // Automatically cast dates to Carbon instances
    protected $casts = [
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
        'due_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

        // Relationship: Task belongs to an Employee
        public function employee()
        {
            return $this->belongsTo(EmployeeModel::class, 'employee_id');
        }
    }