@extends('layouts.app')

@section('title', 'Employee Details')

@section('content')

<div class="content" style="max-width: 1000px; margin: auto; padding: 2rem; font-family: 'Poppins', sans-serif;">
    <!-- Employee Details Card -->
    <div class="card" style="padding: 2rem; box-shadow: 0 6px 15px rgba(0,0,0,0.1); border-radius: 8px; background: white; margin-bottom: 2rem;">
        <h2 style="border-bottom: 3px solid #007bff; padding-bottom: 0.5rem; margin-bottom: 1.5rem; font-weight: 600;">
            Employee Details — {{ $employee->empname }}
        </h2>

        <div style="display: flex; gap: 3rem; flex-wrap: wrap;">
            <div style="flex: 1 1 300px; min-width: 280px;">
                <p><strong>ID:</strong> {{ $employee->id }}</p>
                <p><strong>Employee ID:</strong> {{ $employee->empid }}</p>
                <p><strong>Name:</strong> {{ $employee->empname }}</p>
                <p><strong>Designation:</strong> {{ $employee->designation }}</p>
            </div>
            <div style="flex: 1 1 300px; min-width: 280px;">
                <!-- <p><strong>Experience:</strong> {{ $employee->experience }} yrs</p> -->
                <p><strong>Status:</strong> 
                    @if($employee->status === 'active')
                        <span style="color: #28a745; font-weight: 700;">Active</span>
                    @else
                        <span style="color: #dc3545; font-weight: 700;">Inactive</span>
                    @endif
                </p>
                @if($employee->created_at)
                <p><strong>Created At:</strong> {{ $employee->created_at->format('d M Y, H:i') }}</p>
                @endif
                @if($employee->updated_at)
                <p><strong>Last Updated:</strong> {{ $employee->updated_at->format('d M Y, H:i') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div style="margin-bottom: 1.5rem; text-align: right;">
        <button id="addTaskBtn" style="background: #007bff; color: white; padding: 0.6rem 1.2rem; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
            <i class="fa fa-plus"></i> Add Task
        </button>
    </div>
    <!-- Task Summary -->
    <div class="card" style="padding: 1.5rem; margin-bottom: 2rem; background: #f8f9fa; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h3 style="margin-bottom: 1rem; font-weight: 600;">Task Summary</h3>
        <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
            <div style="background: #007bff; color: white; padding: 1rem 2rem; border-radius: 6px; flex: 1; min-width: 150px; text-align: center;">
                <div style="font-size: 2rem; font-weight: 700;">{{ $totalTasksCount }}</div>
                <div>Total Tasks</div>
            </div>
            <div style="background: #28a745; color: white; padding: 1rem 2rem; border-radius: 6px; flex: 1; min-width: 150px; text-align: center;">
                <div style="font-size: 2rem; font-weight: 700;">{{ $completedTasksCount }}</div>
                <div>Completed Tasks</div>
            </div>
            <div style="background: #ffc107; color: black; padding: 1rem 2rem; border-radius: 6px; flex: 1; min-width: 150px; text-align: center;">
                <div style="font-size: 2rem; font-weight: 700;">{{ $pendingTasks->count() }}</div>
                <div>Pending Tasks</div>
            </div>
        </div>
    </div>

    <!-- Current Task -->
    <div class="card" style="padding: 1.5rem; margin-bottom: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h3 style="margin-bottom: 1rem; font-weight: 600;">Current Task</h3>
    
        @if($currentTask)
            <div style="padding: 1rem; border: 1px solid #007bff; border-radius: 6px;">
                <h4>{{ $currentTask->title }}</h4>
                <p><strong>Descriptionss:</strong> {{ $currentTask->description }}</p>
                <p><strong>Status:</strong> <span style="color: #007bff; font-weight: 700;">In Progress</span></p>
              
                <p><strong>Task Assigned Date:</strong> {{ optional($currentTask->due_date)->format('d M Y, H:i') ?? 'N/A' }}</p>
                <p><strong> Task Started Date:</strong> {{ optional($currentTask->due_date)->format('d M Y') ?? 'N/A' }}</p>
            </div>
        @else
            <p>No current task in progress.</p>
        @endif
    </div>

    <!-- Pending Tasks -->
    <div class="card" style="padding: 1.5rem; margin-bottom: 2rem; background: #f8f9fa; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h3 style="margin-bottom: 1rem; font-weight: 600;">Pending Tasks</h3>
        
        @if($pendingTasks->count() > 0)
            <ul style="list-style-type: none; padding-left: 0;">
                @foreach($pendingTasks as $task)
                <li style="border: 1px solid #ffc107; padding: 1rem; margin-bottom: 1rem; border-radius: 6px; background: white;">
                    <h4>{{ $task->title }}</h4>
                    <p><strong>Description:</strong> {{ $task->description }}</p>
                    <p><strong>Task Assign Date:</strong> {{ optional($task->due_date)->format('d M Y') ?? 'N/A' }}</p>
                </li>
                @endforeach
            </ul>
        @else
            <p>No pending tasks assigned.</p>
        @endif
    </div>

    <!-- Task Timings (All Tasks) -->
    <div class="card" style="padding: 1.5rem; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h3 style="margin-bottom: 1rem; font-weight: 600;">Task Timings</h3>

        @if($allTasks->count() > 0)
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #007bff; color: white;">
                        <th style="padding: 0.75rem; border: 1px solid #ddd;">Task</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd;">Start Time</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd;">End Time</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd;">Duration</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allTasks as $task)
                    <tr>
                        <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $task->title }}</td>
                        <td style="padding: 0.75rem; border: 1px solid #ddd;">
                            {{ optional($task->due_date)->format('d M Y, H:i') ?? 'N/A' }}
                        </td>
                        <td style="padding: 0.75rem; border: 1px solid #ddd;">
                            {{ optional($task->due_date)->format('d M Y, H:i') ?? 'N/A' }}
                        </td>
                        <td style="padding: 0.75rem; border: 1px solid #ddd;">
                            @if($task->started_at && $task->due_date)
                                {{ $task->due_date->diffForHumans($task->due_date, true) }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tasks assigned yet.</p>
        @endif
    </div>

    <div style="margin-top: 2rem;">
        <a href="{{ url('employees') }}" style="color: #007bff; font-weight: 600; text-decoration: none;">
            <i class="fa fa-arrow-left"></i> Back to Employees List
        </a>
    </div>


    <!-- Add Task Modal -->
    <div id="addTaskModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
        background: rgba(0,0,0,0.6); justify-content: center; align-items: center; z-index: 1000;">
        <div style="background: white; padding: 2rem; border-radius: 8px; width: 500px; max-width: 90%; position: relative;">
            <h3 style="margin-bottom: 1rem; font-weight: 600;">Add New Task</h3>
            
            <form id="addTaskForm">
                @csrf <!-- This is required for Laravel CSRF protection -->
                <div id="taskInputs">
                    <div class="task-input" style="margin-bottom: 1rem; position: relative;">
                        <input type="text" name="title[]" placeholder="Task Title" style="width: 100%; padding: 0.5rem; margin-bottom: 0.5rem;" required>
                        <textarea name="description[]" placeholder="Task Description" style="width: 100%; padding: 0.5rem;"></textarea>
                        <input type="date" name="due_date[]" style="width: 100%; padding: 0.5rem;">
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 0.5rem; margin-top: 1rem;">
                    <button type="button" id="addMoreTask" style="background: #28a745; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer;">
                        Add More
                    </button>
                    <button type="button" id="cancelTask" style="background: #dc3545; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer;">
                        Cancel
                    </button>
                    <button type="submit" style="background: #007bff; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer;">
                        Assign
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {

    // Show modal
    $('#addTaskBtn').click(function() {
        $('#addTaskModal').css('display', 'flex');
    });

    // Cancel button
    $('#cancelTask').click(function() {
        $('#addTaskModal').hide();
        resetTaskInputs();
    });

    // Function to reset inputs to a single field
    function resetTaskInputs() {
        $('#taskInputs').html(`
            <div class="task-input" style="margin-bottom: 1rem; position: relative;">
                <input type="text" name="title[]" placeholder="Task Title" style="width: 100%; padding: 0.5rem; margin-bottom: 0.5rem;" required>
                <textarea name="description[]" placeholder="Task Description" style="width: 100%; padding: 0.5rem;"></textarea>
            </div>
        `);
    }

    // Add More button
    $('#addMoreTask').click(function() {
        $('#taskInputs').append(`
            <div class="task-input" style="margin-bottom: 1rem; position: relative; border-top: 1px solid #ddd; padding-top: 0.5rem;">
                <input type="text" name="title[]" placeholder="Task Title" style="width: 100%; padding: 0.5rem; margin-bottom: 0.5rem;" required>
                <textarea name="description[]" placeholder="Task Description" style="width: 100%; padding: 0.5rem;"></textarea>
                <input type="date" name="due_date[]" style="width: 100%; padding: 0.5rem;" >
                <button type="button" class="removeTask" style="position: absolute; top: 0; right: 0; background: #dc3545; color: white; border: none; padding: 0.2rem 0.5rem; border-radius: 4px; cursor: pointer;">Remove</button>
            </div>
        `);
    });

    // Remove specific task input
    $(document).on('click', '.removeTask', function() {
        $(this).closest('.task-input').remove();
    });

    // Handle form submit
    $('#addTaskForm').submit(function(e) {
        e.preventDefault();

        let formData = $(this).serialize() + '&employee_id={{ $employee->id }}';

        $.ajax({
            url: "{{ url('tasks_store') }}", // your route to save task
            type: "POST",
            data: formData,
            success: function(response) {
                alert('Tasks added successfully!');
                location.reload(); // reload page to show new tasks
            },
            error: function(err) {
                alert('Error adding tasks.');
                console.log(err);
            }
        });
    });

});
</script>
@endsection