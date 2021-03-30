@extends('layouts.app')

@section('content')
    <h4 class='text-center my-5'>Admin Page</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Students
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                        @if(count($students))
                        @foreach($students as $student)
                        <li class="list-group-item">
                            {{ $student->student_name }}
                            <a href="/admin/lecture/{{$student->id}}">Assign</a>
                        </li>
                        @endforeach
                        @else
                        <h3>No record found</h3>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                        <div class="card-header">
                            teachers
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
                            @if(count($teachers))
                            @foreach($teachers as $teacher)
                            <li class="list-group-item">
                                {{ $teacher->teacher_name }}
                            </li>
                            @endforeach
                            @else
                            <h3>No record found</h3>
                            @endif
                            </ul>
                        </div>
                </div>
            </div>
        </div>

@endsection