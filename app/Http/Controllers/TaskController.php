<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
   public function savetasks(Request $request)
    {
       // dd($request);
        $employee_id = $request->employee_id;
        // $startdate = $request->due_date;
        // dd($startdate);
        // Loop through all submitted tasks
        foreach ($request->title as $index => $title) {
            Task::create([
                'employee_id' => $employee_id,
                'title'       => $title,
                'description' => $request->description[$index] ?? null,
                'due_date'    => $request->due_date[$index] ?? null,
                'status'      => 'pending', // default status
            ]);
        }

        return response()->json([
            'message' => 'Tasks saved successfully!',
        ]);
    }
}
