@extends('admin.layout')

@section('content')
    <div class="container vh-100 text-dark">
        <div class="row vh-100 wow fadeIn">
            <div class="col-6 col-lg-3 m-auto text-center wow zoomIn" data-wow-duration="0.5s">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="display-3">Вход</div>
                    <div class="input-group border-bottom border-dark my-4">
                        <div class="input-group-prepend">
                            <i class="material-icons fs-24 mr-1">&#xe7ff;</i>
                        </div>
                        <input id="name" type="name" placeholder="Пользователь"
                               class="form-control bg-white no-border no-focus @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group border-bottom border-dark my-3">
                        <div class="input-group-prepend">
                            <i class="material-icons fs-24 mr-1">&#xe0da;</i>
                        </div>
                        <input id="password" type="password"
                               placeholder="Пароль"
                               class="form-control bg-white no-border no-focus @error('password') is-invalid @enderror" name="password"
                               required
                               autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                            <input class="d-none" type="checkbox" name="remember"
                                   id="remember" checked>

                    <div class="form-group mt-4">
                        <button class="btn w-100 rounded-0 shadow-none border border-dark" type="submit">Вход</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
