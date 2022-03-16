@extends('layout.layout_admin')

@section('display')
<a class="open" href="javascript:void(0)" onclick="openMenu()"><i class="bi bi-list fs-1"></i></a>
<div class="container-fluid padding p-0">
  <h2 class="display-4" style="font-size:36px;">Đánh giá từ khách hàng</h2>
  @if(session('notice'))
  <p class="alert alert-success">{{session('notice')}}</p>
  @endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Khách hàng</th>
        <th scope="col">Email</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @if(count($reply) > 0)
      @foreach($reply as $rep)
      @php
      $urlImage = str_contains($rep->user->image,"https") == false ? "./image/".$rep->user->image : $rep->user->image;
      @endphp
      <tr>
        <th scope="row">{{$rep->reply}}</th>
        <td><img src="{{$rep->product->thumbnail}}" alt="{{$rep->product->title}}" width="100px"
            title="{{$rep->product->title}}"></td>
        <td><img class="rounded-circle" src="{{$urlImage}}" alt="{{$rep->user->name}}" title="{{$rep->user->name}}"
            width="60px"></td>
        <td>{{$rep->user->email}}</td>
        <td>{{$rep->content}}</td>
        <td><button class="btn btn-danger" data-toggle="modal" data-target="#modalDelete_{{$rep->id}}">Xóa <i
              class="far fa-trash-alt"></i></button></td>
      </tr>
      <div class="modal fade" id="modalDelete_{{$rep->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa đánh giá khách hàng</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Hành động này sẽ xóa đánh giá khỏi hệ thống và không thể khôi phục lại. Bạn có chắc chắn muốn xóa đánh giá
              của {{$rep->user->name}}?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              <a href="admin/dashboard/delete-comments/{{$rep->id}}"><button type="button" class="btn btn-danger">Xóa
                  ngay</button></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
@endsection
@section('title')
Đánh giá từ khách hàng
@endsection