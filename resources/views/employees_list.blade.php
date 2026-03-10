@extends('layouts.app')

@section('title', 'Employees')

@section('content')

<div class="content">
    <div class="main" id="main">
        <div class="header">
            <div class="menu-toggle" id="menu-toggle"><i class="fa-solid fa-bars"></i></div>

            <div class="datetime" id="datetime"></div>

            <div class="header-right">
                <div class="toggle" onclick="toggleMode()">🌙 Mode</div>
                <div>🔔</div>
                <div>👤</div>
            </div>
        </div>

        <h2>Employees List</h2>

        <table id="employeesTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>EMP ID</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Experience</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

@endsection

@section('scripts')

<script>
$(document).ready(function(){

    $('#employeesTable').DataTable({
        processing: true,
        ajax: {
            url: "{{ url('view_employees') }}",
            dataSrc: "data"
        },
        columns: [
            { data: 'id' },
            { data: 'empid' },
            { data: 'empname' },
            { data: 'designation' },
            { 
                data: 'experience',
                render: function(data){
                    return data + " yrs";
                }
            },
            { data: 'status' },
            {
                data: 'id',
                render: function(data){
                    return `
                        <a href="/employee-view/${data}" class="btn btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                    `;
                }
            }
        ]
    });

});
</script>

@endsection