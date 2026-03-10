@extends('layouts.app')

@section('title', 'Dashboard')

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

        <div class="content">
            <div class="cards">
                <div class="card">
                    <h3>Tasks Completed</h3>
                    <p>120</p>
                </div>
                <div class="card">
                    <h3>Active Users</h3>
                    <p>45</p>
                </div>
                <div class="card">
                    <h3>Pending Approvals</h3>
                    <p>8</p>
                </div>
                <div class="card">
                    <h3>Messages</h3>
                    <p>5</p>
                </div>
            </div>

            <div class="panel">
                <h2>Activity Overview</h2>
                <p>Future charts / tables here</p>
            </div>
        </div>
    </div>
</div>
@endsection