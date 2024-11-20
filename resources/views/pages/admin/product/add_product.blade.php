@extends('master_admin') 
@section('admin_content') 
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
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
                    <form role="form" action="{{ route('product.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="product_name"
                                placeholder="Nhập tên sản phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="product_slug">Slug sản phẩm</label>
                            <input type="text" name="product_slug" class="form-control" id="product_slug"
                                placeholder="Nhập slug sản phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Giá sản phẩm</label>
                            <input type="number" name="product_price" class="form-control" id="product_price"
                                placeholder="Nhập giá sản phẩm" required>
                        </div>
                        <div class="form-group">
                            <label for="product_desc">Mô tả sản phẩm</label>
                            <textarea name="product_desc" class="form-control" id="product_desc" rows="5"
                                placeholder="Mô tả sản phẩm" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="product_content">Nội dung sản phẩm</label>
                            <textarea name="product_content" class="form-control" id="product_content" rows="5"
                                placeholder="Nội dung chi tiết sản phẩm" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_cate">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control" id="product_cate" required>
                                @foreach($cate_product as $cate)
                                    <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_brand">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control" id="product_brand" required>
                                @foreach($brand_product as $brand)
                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_status">Trạng thái sản phẩm</label>
                            <select name="product_status" class="form-control" id="product_status" required>
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_image">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="product_image">
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection