@extends('master_admin')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
            </header>

            @php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
            @endphp
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('brand.product.save') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="brand_product_name">Tên thương hiệu</label>
                            <input type="text" name="brand_product_name" class="form-control" id="brand_product_name"
                                placeholder="Tên thương hiệu" required>
                        </div>

                        <div class="form-group">
                            <label for="brand_slug">Slug</label>
                            <input type="text" name="brand_slug" class="form-control" id="brand_slug" placeholder="Slug"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="brand_product_desc">Mô tả thương hiệu</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc"
                                id="brand_product_desc" placeholder="Mô tả thương hiệu" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="brand_product_status">Hiển thị</label>
                            <select name="brand_product_status" class="form-control input-sm m-bot15" required>
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>

                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection