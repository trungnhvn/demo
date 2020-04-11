@extends('admin.theme.default')

@section('content')

<div class="row">
    <h1>List of category</h1>
</div>
<div class="row">
    <a href="{{ url('/admin/categories/create') }}" class="btn btn-success btn-sm" title="Add New Category">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New Category
    </a>
    <table style="text-align: center" class="table table-bordered tbClone" cellspacing="0" cellpadding="0">
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Slug</th>
            <th>Category Parent ID</th>
            <th>Action</th>
        </tr>
        @foreach($cates as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->cate_name}}</td>
            <td>{{$item->cate_slug}}</td>
            <td>{{$item->cate_parent}}</td>
            <td style="text-align: center">
                <a href="{{ route('categories.edit',$item->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $item->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
            @if(count($item->childs))
                @include('admin/categories/index_child', ['childs' => $item->childs])
            @endif
        @endforeach
    </table>
</div>

@endsection
