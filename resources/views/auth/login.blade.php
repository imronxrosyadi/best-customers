@extends('layouts.app')

@section('meta_title', 'Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
{{--                        style="background: url({{ asset('images/logo.jpeg') }});background-position: center;background-size: cover;"--}}
                        <div class="col-lg-6 d-none d-lg-block text-center">
{{--                            <img src="{{ asset('images/logo.jpeg') }}" alt="login-img" width="455px" height="405px">--}}
                            <img src="{{ asset('images/logo.jpeg') }}" alt="login-img" width="250px" height="250px" class="mt-5">
                            <h4 class="text-gray-900 mt-4">PT. Setiabudi Hojaya</h4>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang di <br> Sistem Penunjang Keputusan</h1>
                                </div>
                                <form class="user" action="/login" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="email" placeholder="Masukan Alamat Email...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Kata Sandi">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                        </div>
                                    </div>
                                    <!-- <a href="/login" class="btn btn-primary btn-user btn-block">Login</a> -->
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Masuk</button>
                                    <small class="d-block text-center mt-3">Tidak Terdaftar?<a href="/register"> Daftar</a> </small>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
