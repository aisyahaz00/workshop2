@extends('layouts.auth.halaman-layout')

@section('konten')

<div class="card">
    <div class="card-header text-center">
        <h3>Masuk</h3>
        <p>Mari belanja album kesukaanmu!! Masuklah ke akun yang telah kamu buat</p>
    </div>
    <div class="card-body">
        <form action="{{route('loginRequest')}}" method="POST">
            @csrf

            <div class="input-group form-group row mb-3 ms-1">
                <label for="inputEmail3" class="col-sm-0 col-form-label">Email</label>
                <div class="col-sm-15">
                    <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                </div>
            </div>

            <div class="input-group form-group row mb-3 ms-1">
                <label for="inputPassword6" class="col-sm-0 col-form-label">Password</label>
                <div class="col-sm-15">
                    <input type="password" class="form-control" placeholder="Masukkan password" name="password">
                </div>
            </div>

            {{-- <div class="row align-items-center remember mb-4">
                <input type="checkbox" name="remember" checked="1">Tetap masuk
            </div> --}}

            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn float-right login_btn"> Masuk </button>
            </div>

        </form>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-center links">
            Sudah punya akun?<a href="{{ route('register') }}">Daftar</a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#">Lupa password?</a>
        </div>
    </div>
</div>

@endsection