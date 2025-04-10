@extends('layouts.AdminLayout')

@section('main')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mt-4">Quản lý Bình Luận</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCmt as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->product_name }}</td>
                        <td>{{ $value->content }}</td>
                        <td>{{ $value->user_name }}</td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-bs-id="{{ $value->id }}" href="">Xóa</button>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
        {{ $listCmt->links('pagination::bootstrap-5') }}
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
            formDelete.setAttribute('action', '{{ route('admin.comments.deleteComment') }}' + "?idCmt=" + id)
        })
    </script>
@endpush
