<div class="d-flex flex-column p-4 text-white bg-dark" style="height: 100vh;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                <i class="fas fa-tachometer-alt me-4"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.listCategory') }}" class="nav-link text-white">
                <i class="fas fa-layer-group me-4"></i> Quản lý danh mục
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.listProduct') }}" class="nav-link text-white">
                <i class="fas fa-box me-4"></i> Quản lý sản phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.listUser') }}" class="nav-link text-white">
                <i class="fas fa-user me-4"></i> Quản lý user
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.listOrder') }}" class="nav-link text-white">
                <i class="fas fa-shopping-cart me-4"></i> Quản lý đơn hàng
            </a>
        </li>
        <li>
            <a href="{{ route('admin.comments.listComment') }}" class="nav-link text-white">
                <i class="fas fa-comment me-4"></i> Quản lý bình luận
            </a>
        </li>
    </ul>
</div>
