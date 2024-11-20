@extends('master_admin')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>

            @if (Session::has('message'))
                <span class="text-alert">{{ Session::get('message') }}</span>
                {{ Session::forget('message') }}
            @endif

            <div class="panel-body">
                @foreach($edit_brand_product as $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{ route('brand.product.update', $edit_value->brand_id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" value="{{ $edit_value->brand_name }}" name="brand_product_name"
                                    class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" value="{{ $edit_value->brand_slug }}" name="brand_product_slug"
                                    class="form-control" id="exampleInputEmail1" placeholder="Slug">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc"
                                    id="exampleInputPassword1"
                                    placeholder="Mô tả thương hiệu">{{ $edit_value->brand_desc }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15">
                                    <option value="1" {{ $edit_value->brand_status == 1 ? 'selected' : '' }}>Hiển thị</option>
                                    <option value="0" {{ $edit_value->brand_status == 0 ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div>

                            <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương
                                hiệu</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection