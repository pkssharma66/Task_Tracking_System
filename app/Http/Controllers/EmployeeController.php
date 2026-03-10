<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Carbon\Carbon;
class EmployeeController extends Controller
{

    public function employeesPage()
    {
        return view('employees_list'); // your blade file
    }

    public function index()
    {
       $employees = EmployeeModel::where('status', 'active')->get();

                return response()->json([
                    'data' => $employees
                ]);

                    // return view("employees_list",compact('employees'));

    }


    public function showEmployee($id)
{
    $employee = EmployeeModel::findOrFail($id);

    // Assuming relationships: employee has tasks with fields like status and timings
    $allTasks = $employee->tasks()->get();  // all tasks
    $currentTask = $employee->tasks()->where('status', 'in_progress')->first();
    //dd($currentTask);
    $pendingTasks = $employee->tasks()->where('status', 'pending')->get();
    $completedTasksCount = $employee->tasks()->where('status', 'completed')->count();
    $totalTasksCount = $allTasks->count();

    return view('employee_view', compact(
        'employee', 'allTasks', 'currentTask', 'pendingTasks', 'completedTasksCount', 'totalTasksCount'
    ));
}
}
