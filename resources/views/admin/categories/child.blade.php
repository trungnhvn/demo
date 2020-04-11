@foreach($childs as $child)
    <option value="{{$child->id}}"
        @if ($child->id == old('cate_parent', $category->cate_parent))
            selected="selected"
        @endif>&nbsp;&nbsp;&nbsp;{{$child->cate_name}}</option>
    @if(count($child->childs))
        @include('admin/categories/child', ['childs' => $child->childs])
    @endif
@endforeach
