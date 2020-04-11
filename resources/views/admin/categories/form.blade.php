<div>
    <div class="form-group">
    <label for="cate_parent">Category Parent:</label>
    <select name="cate_parent" id="input" class="form-control" required="required">
       <option value="0">Chuyên mục chính</option>
       @foreach($cates as $item))
           <option value="{{ $item->id }}"
            @if ($item->id == old('cate_parent', $category->cate_parent))
                selected="selected"
            @endif>{{ $item->cate_name }}
           </option>
           @if(count($item->childs))
               @include('admin/categories/child', ['childs' => $item->childs])
           @endif
       @endforeach
   </select>
</div>
<div class="form-group">
    <label for="cate_name">Category Name:</label>
    <input type="text" class="form-control" name="cate_name" value="{{$category ? $category->cate_name : ""}}"/>
</div>
<div class="form-group">
   {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
</div>
