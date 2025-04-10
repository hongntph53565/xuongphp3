@extends('layouts.AdminLayout')
@push('styles')
    <style>
        .img-product {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
@endpush
@section('main')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mt-4">Danh sách Sản phẩm</h1>
        </div>
        <a href="{{ route('admin.products.addProduct') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Thương hiệu</th>
                    <th>Hot</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProduct as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->cateName }}</td>
                        <td><img class="img-product" src="{{ asset($value->image) }}" alt=""></td>
                        <td>{{ $value->brand }}</td>
                        <td>{{ $value->is_hot }}</td>
                        <td>
                            {{-- <a class="btn btn-success" href="{{ route('admin.products.detailProduct', $value->id) }}">Chi
                                tiết</a> --}}
                            <a class="btn btn-warning"
                                href="{{ route('admin.products.updateProduct', $value->id) }}">Sửa</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-bs-id="{{ $value->id }}" href="">Xóa</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $listProduct->links('pagination::bootstrap-5') }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Cảnh báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formDelete">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p class="text-danger">Bạn có muốn xóa không?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

@section('css')
@endsection
@push('scripts')
    <script>
        var exampleModal = document.getElementById('deleteModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('data-bs-id')
            // console.log(id);
            let formDelete = document.getElementById('formDelete')
            formDelete.setAttribute('action', '{{ route('admin.products.deleteProduct') }}' + "?idProduct=" + id)
        })
    </script>
@endpush
