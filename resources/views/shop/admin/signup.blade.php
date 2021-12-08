@extends('layout.login_master')
@section('content')
<div class="container-fluid p-0">
    <div class="col-lg-4 col-md-7 col-sm-12 bg-light p-2 position-fixed float-left" style="height:100%;z-index:1000;">
        <div class="w-100 position-relative" style="height:100%;">
            <div class="form w-100 position-absolute" style="bottom:0%;">
                <form action="sign-up" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <h2 class="display-4 text-center" style="font-size:48px;">Đăng ký</h2>
                    @if(count($errors)>0)
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{$err}}</p>
                    @endforeach
                    @endif
                    @if(session('notice'))
                    <p class="alert alert-success">{{session('notice')}}</p>
                    @endif
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input class="form-control" type="text" name="fullname" placeholder="Họ tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="e-mail@example.com" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input class="form-control" type="password" name="re-password"
                            placeholder="Nhập lại mật khẩu" />
                    </div>
                    <a href="login">Bạn đã có tài khoản ?</a>
                    <div class="form-group">
                        <button class="btn btn-outline-info btn-md w-100">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-5 col-sm-12 text-center float-right p-5">
        <img src="image/logo1.png" class="mx-auto" width="30%" />
        <h2 class="display-4 text-white p-4">Cơ hội trở thành đối tác khi trở thành thành viên của chúng tôi</h2>
    </div>
</div>
@endsection
@section('title')
Đăng ký
@endsection