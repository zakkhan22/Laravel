@extends('layouts.app')

@section('content')

    <h1 class="text-center my-5">Register Teacher</h1>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register a new Teacher</div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.register.teacher')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type ="text" class= "form-control" placeholder= "Teacher Name" name="teacher_name">
                    </div>
                    @error('teacher_name')
                    {{$message}}
                    @enderror

                    <div class="form-group">
                        <input type ="text" class= "form-control" placeholder= "Teacher Reg no" name="teacher_reg_no" >
                    </div>
                    @error('teacher_reg_no')
                    {{$message}}
                    @enderror

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder= "Enter Password" name = "teacher_password">
                    </div>
                    @error('teacher_password')
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