@extends('admin.theme.default')

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
       <h1 class="display-3">Add Category</h1>
     <div>
       @if ($errors->any())
         <div class="alert alert-danger">
           <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
           </ul>
         </div><br />
       @endif

         {!! Form::open(['url' => ['/admin/categories', $category->id], 'class' => 'form-horizontal clearfix f', 'files' => true]) !!}
         @csrf
         @method('PATCH')
         @include ('admin.categories.form', ['formMode' => 'edit'])

         {!! Form::close() !!}
     </div>
    </div>
</div>
@endsection
