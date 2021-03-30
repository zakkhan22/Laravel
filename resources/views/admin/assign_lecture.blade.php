@extends('layouts.app')
@section('content')
<div class="card m-4">
    <div class="card-header">
        Student Lecture
    </div>
    <div class="card-body">
        <form action="/admin/lecture/{{$student->id}}" method="post">
        @csrf
        <select name="course" id="">
            @foreach($courses as $c)
            <option value="{{$c->id}}">{{$c->course_name}}</option>
            @endforeach
        </select>
        <button type="submit">Assign</button>
    </form>
    </div>
</div>
@endsection