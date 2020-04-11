<style>
.f{width: 50%;padding: 5px;}
li{list-style-type: none}
label{width: 20%}
.tb {
        width: 50%;
        padding: 5px;
    }
</style>
<div>
    <ul>
    </li>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('product_cate', 'Danh mục sản phẩm', ['class' => 'required']) !!}
        {{ Form::select('product_cate', $cates, null,['placeholder' => '- Danh mục sản phẩm -','class' => 'f tb']) }}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
 </li>
<li>
    <li>
        <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('product_name', 'Tên sản phẩm', ['class' => 'required']) !!}
            {!! Form::text('product_name', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>

    </li>
        <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('product_code', 'Mã sản phẩm', ['class' => 'required']) !!}
            {!! Form::text('product_code', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
     </li>
    </li>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('product_teaser', 'Mô tả ngắn gọn', ['class' => 'required']) !!}
        {!! Form::textarea('product_teaser', null, ['class' => 'form-control description'] ) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('produc_content', 'Mô tả sản phẩm', ['class' => 'required']) !!}
        {!! Form::textarea('produc_content', null, ('required' == 'required') ? ['class' => 'form-control description'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
 </li>
 <li>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('product_price', 'Giá sản phẩm', ['class' => 'required']) !!}
        {!! Form::text('product_price', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

</li>
<li>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('oldPrice', 'Giá cũ', ['class' => 'required']) !!}
        {!! Form::text('oldPrice', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
        {!! $errors->first('oldPrice', '<p class="help-block">:message</p>') !!}
    </div>

</li>
<li>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('stock_amount', 'Số lượng', ['class' => 'required']) !!}
        {!! Form::text('stock_amount', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

</li>
<li>
    <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
        {!! Form::label('name', 'Hình ảnh', ['class' => 'required']) !!}
        {!! Form::file('image', null, ('required' == 'required') ? ['class' => 'f', 'required' => 'required'] : ['class' => 'f']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>

</li>
    <li>
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Lưu', ['class' => 'btn btn-primary']) !!}
            </li>
    </ul>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.description',
        width: 1000,
        height: 300
    });
</script>
