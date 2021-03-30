@extends('layouts.app')

@section('content')

    <h1 class="text-center my-5">Register Course</h1>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register a new Course</div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.register.lecture') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <input type ="text" class= "form-control" placeholder= "Course Name" name="lec_name" value="{{old('lec_name')}}">
                    </div>
                    @error('lec_name')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <input type ="text" class= "form-control" placeholder= "Course Code" name="c_code"  value="{{old('c_code')}}">
                    </div>
                    @error('c_code')
                    {{$message}}
                    @enderror
                    <div class="form-group">
                        <textarea name="lec_desc" placeholder="Course Description" cols="5" rows="5" class="form-control" value="{{old('lec_desc')}}"></textarea>
                    </div>
                    @error('lec_desc')
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