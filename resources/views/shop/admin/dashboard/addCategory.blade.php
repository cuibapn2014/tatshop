@extends('layout.layout_admin')
@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<div class="container-fluid padding p-0">
    <h2 class="display-4" style="font-size:36px;">Thêm danh mục</h2>
    <hr />
    @if(count($errors)>0)
    @foreach($errors->all() as $err)
    <p class="alert alert-danger">{{$err}}</p>
    @endforeach
    @endif
    @if(session('notice'))
    <p class="alert alert-success">{{session('notice')}}</p>
    @endif
    <form action="admin/dashboard/them-danh-muc" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="form-group">
            <label for="">Danh mục mới</label>
            <input class="form-control" type="text" name="category" placeholder="Nhập tên danh mục" />
        </div>
        <div class="form-group">
            <label for="">Loại thuộc danh mục</label>
            <select class="form-control mb-1" name="old_category">
                @foreach($category as $cate)
                <option value="{{$cate->id}}">{{$cate->category}}</option>
                @endforeach
            </select>
            <input class="form-control" type="text" name="subcategory" placeholder="Nhập loại" />
        </div>

        <button type="submit" class="btn btn-danger btn-md">+ Thêm danh mục</button>
    </form>
    <hr />
    <h2 class="display-4" sytle="font-size:28px;">Quản lý danh mục</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $cate)
            <tr>
                <th scope="row">{{$cate->id}}</th>
                <td>{{$cate->category}}</td>
                <td>
                    <button class="btn btn-danger rounded-0" data-toggle="modal"
                        data-target="#exampleModal_{{$cate->id}}">Xóa <i class="far fa-trash-alt"></i></button>
                </td>
                
            </tr>
            <div class="modal fade" id="exampleModal_{{$cate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa danh mục sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hành động này sẽ xóa danh mục khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn
                            muốn xóa <strong>{{$cate->category}}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="admin/dashboard/delete-category/{{$cate->id}}"><button type="button"
                                    class="btn btn-danger">Xóa ngay</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    <hr />
    <h2 class="display-4" sytle="font-size:28px;">Quản lý loại sản phẩm</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Loại</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>

            @foreach($sub as $sub)
            <tr>
                <th scope="row">{{$sub->id}}</th>
                <td>{{$sub->category->category}}</td>
                <td>{{$sub->sub_category}}</td>
                <td>
                    <button class="btn btn-danger rounded-0" data-toggle="modal"
                        data-target="#exampleModal_{{$sub->id}}">Xóa <i class="far fa-trash-alt"></i></button>
                </td>
            </tr>
            <div class="modal fade" id="exampleModal_{{$sub->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa loại sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Hành động này sẽ xóa loại sản phẩm khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn
                            muốn xóa <strong>{{$sub->sub_category}}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="admin/dashboard/delete-subcategory/{{$sub->id}}"><button type="button"
                                    class="btn btn-danger">Xóa ngay</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('content');
CKEDITOR.config.autoParagraph = false;
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
</script>
@endsection
@section('title')
Thêm danh mục
@endsection