<!-- sidebar menu start-->
<div class="leftside-navigation">
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a class="active" href="{{ route('admin.dashboard') }}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-book"></i>
                <span>Danh mục sản phẩm</span>
            </a>
            <ul class="sub">
                <li><a href="{{ route('category.product.add') }}">Thêm danh mục sản phẩm</a></li>
                <li><a href="{{ route('category.product.all') }}">Liệt kê danh mục sản phẩm</a></li>
            </ul>
        </li>

        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-book"></i>
                <span>Thương hiệu sản phẩm</span>
            </a>
            <ul class="sub">
                <li><a href="{{ route('brand.product.add') }}">Thêm thương hiệu sản phẩm</a></li>
                <li><a href="{{ route('brand.product.all') }}">Liệt kê thương hiệu sản phẩm</a></li>
            </ul>
        </li>

    </ul>
</div>
<!-- sidebar menu end-->