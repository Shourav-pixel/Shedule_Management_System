@extends('admin.layout.default')
@section('abc')


<br/>
<br/>
<div class="container">
        <h2>Course List</h2>
        @if(Session::has('dlt'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('dlt')}}</strong>
      </div>
    @endif
        <a href="{{ url('addcourse') }}"class="btn btn-info" >Create Course</a>
       
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Course Credit</th>
                    <th>Course Type</th>
                    <th>Semester</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
                
                    @foreach($courses as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->course_title}}</td>
                            <td>{{ $c->course_code}}</td>
                            <td>{{ $c->course_credit}}</td>
                            <td>{{ $c->course_type}}</td>
                            <td>{{ $c->semester_id}}</td>
                            <td>
                            <a href="{{ url('assign-teacher/'.$c->id) }}" class="btn btn-primary btn-sm">Assign</a>
                                <a href="{{ url('edit-course/'.$c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ url('delete-course/'.$c->id)}}"class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                
            </tbody>
            
        </table>
        <br>
        <div class="row"><center>
        {{ $courses->links() }}
        </center>
        </div>
        <br>
      
         

    </div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@stop