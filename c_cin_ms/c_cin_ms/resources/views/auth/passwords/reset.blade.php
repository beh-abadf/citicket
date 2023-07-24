@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @include('errors/visualize_error')

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row mb-3 fs-5" style="font-family: vazir;">
                                <label for="email" class="col-md-4 col-form-label text-md-end ">
                                    آدرس ایمیل</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control" name="email"
                                        value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                </div>
                            </div>

                            <div class="row mb-3 fs-5 per_fons" style="font-family: vazir;text-align:right">
                                <label for="password" class="col-md-4 col-form-label text-md-end">
                                    پسورد
                                </label>

                                <div class="col-md-6 ">
                                    <input id="password" type="password" class="form-control" name="password"
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3 fs-5" style="font-family: vazir;">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                                    تایید رمزعبور
                                </label>

                                <div class="col-md-6 per_fonts">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        بازنشانی رمزعبور
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
