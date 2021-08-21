@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{  $user->role === "admin" ? "Admin Dashboard" : "User Panel" }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($user->role === "admin")
                        @include('partial.adminDashboard')
                    @else
                        @include('partial.userDashboard')
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{  $user->role === "admin" ? "Available Tickets" : "My purchases" }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($user->role === "admin")
                        @include('partial.adminDashboard')
                    @else
                        @include('partial.userDashboard')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
