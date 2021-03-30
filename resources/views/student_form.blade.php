@extends('layouts.app')

@section('content')

    <h1 class="text-center my-5">Register Student</h1>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register a new Student</div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.register.student')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type ="text" class= "form-control" placeholder= "Student Name" name="student_name" value="{{old('student_name')}}">
                    </div>
                    @error('student_name')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                    <input type ="text" class= "form-control" placeholder= "Student Reg no" name="student_reg_no"  value="{{old('student_reg_no')}}">
                    </div>
                    @error('student_reg_no')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder= "Enter Password" name="student_password">
                    </div>
                    @error('student_password')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection