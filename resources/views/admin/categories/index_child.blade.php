@foreach($childs as $child)
<tr>
    <td><i class="fas fa-arrow-right"></i> {{$child->id}}</td>
    <td><i class="fas fa-arrow-right"></i> {{$child->cate_name}}</td>
    <td><i class="fas fa-arrow-right"></i> {{$child->cate_slug}}</td>
    <td><i class="fas fa-arrow-right"></i> {{$child->cate_parent}}</td>
    <td>
        <a href="{{ route('categories.edit',$child->id)}}" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <form action="{{ route('categories.destroy', $child->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </td>
</tr>
    @if(count($child->childs))
        @include('admin/categories/index_child', ['childs' => $child->childs])
    @endif
@endforeach
