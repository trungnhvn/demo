@extends('admin.theme.default')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-3">List of Customers</h1>
    @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @endif
    <div>
        <a style="margin: 19px;" href="{{ route('customers.create')}}" class="btn btn-primary">New customer</a>
        </div>
      <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Email</td>
              <td>Tel</td>
              <td>City</td>
              <td>Country</td>
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->tel}}</td>
                <td>{{$customer->city}}</td>
                <td>{{$customer->country}}</td>
                <td>
                    <a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
    </div>
@endsection
