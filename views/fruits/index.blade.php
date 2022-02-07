@extends('fruits.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Check all fruits</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('fruits.create') }}"> Create new fruits</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($fruits as $fruit)
        <tr>
            <td>{{ $fruit->id  }}</td>
            <td>{{ $fruit->title }}</td>
            <td>{{ $fruit->price }}</td>
            <td>{{ $fruit->description }}</td>
            <td>
                <form action="{{ route('fruits.destroy',$fruit->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('fruits.show',$fruit->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('fruits.edit',$fruit->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    
      
@endsection