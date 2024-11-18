@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('errors/visualize_error')
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end per_fonts fs-5">نام</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end per_fonts fs-5">آدزس ایمیل
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end per_fonts fs-5">پسورد
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"  name="password" value="{{ old('password') }}" autocomplete="new-password">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end per_fonts fs-5">تکرار پسورد
                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="confirmed_password" value="{{ old('confirmed_password') }}" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary ">
                                    ثبت نام
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
