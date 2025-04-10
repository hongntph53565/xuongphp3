@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mt-4">Danh sách danh mục</h1>
        </div>
        <a href="{{ route('admin.categories.addCategory') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCate as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a class="btn btn-warning"
                                href="{{ route('admin.categories.updateCategory', $value->id) }}">Sửa</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-bs-id="{{ $value->id }}" href="">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $listCate->links('pagination::bootstrap-5') }}
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
            formDelete.setAttribute('action', '{{ route('admin.categories.deleteCategory') }}' + "?idCate=" + id)
        })
    </script>
@endpush
