@extends('layout.login_master')
@section('content')
<div class="container-fluid p-0">
    <div class="col-lg-4 col-md-7 col-sm-12 p-2 position-fixed bg-light shadow" style="height:100%;z-index:1000;align-content:space-between;">
        <div class="w-100 position-relative d-flex align-items-center" style="height:100%;">
            <div class="form w-100">
                <form action="{{route('login')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <h2 class="display-4 text-center fs-1 mb-5">Đăng Nhập</h2>
                    @if(count($errors)> 0)
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">
                        {{$err}}
                    </p>
                    @endforeach
                    @endif
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="username"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name="password"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Tự động đăng nhập
                        </label>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-info text-white w-100 p-2 fs-5">Đăng nhập</button>
                    </div>
                    <p class="w-100 text-center">OR</p>
                    <div class="form-group">
                        <a href="{{route('login.facebook')}}" class="btn btn-primary w-100 fs-5 p-2" target="_blank">Đăng nhập với
                            Facebook <i class="bi bi-facebook"></i></a>
                        Bạn chưa có tài khoản? <a href="sign-up">Đăng ký tại đây</a><br />
                        <a href="#">Quên mật khẩu</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <div class="col-lg-8 col-md-5 col-sm-12 text-center float-right p-5" style="height:100%; padding-top:23%;">
        <img src="image/logo1.png" class="mx-auto" width="30%" />
        <h2 class="display-4 text-white p-4">Cửa hàng quần áo trực tuyến</h2>
    </div>
</div>
@endsection
@section('title')
Đăng nhập
@endsection