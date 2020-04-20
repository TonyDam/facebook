@extends('layouts.app')

<title>Facebook - Compte</title>

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
            @endif
            <div class="card mb-2">
                <div class="card-header" style="background: #23282E!important; color: white!important;">Settings</div>
                <div class="card-body">
                    <form action="{{ route('account.destroyAvatar') }}" method="POST">
                        @csrf
                        <button style=" position: absolute; left: 55%; top: 15%;
    transform: translate(-50%,-50%)" type="submit" class="btn" onclick="if(confirm('Delete your picture ?')){ return true;}else{ return false;}">x</button>
                    </form>
                    <form method="POST" action="{{ route('account.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mx-auto mb-2" style="width:80px; height:80px;"><img id="user-avatar"
                                class="m-auto rounded img-thumbnail" src="{{Auth::user()->getAvatar()}}" width="100%"
                                height="100%">
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="avatar"
                                    class="form-control @error('avatar') is-invalid @enderror" name="avatar"
                                    accept="image/png, image/jpeg" value="{{ old('avatar') }}" autocomplete="avatar"
                                    autofocus onclick="changeImage();" value="">

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pseudo"
                                class="col-md-4 col-form-label text-md-right">{{ __("Username") }}</label>

                            <div class="col-md-6">
                                <input id="pseudo" type="text"
                                    class="form-control @error('pseudo') is-invalid @enderror" name="pseudo"
                                    value="{{Auth::user()->pseudo}}" autocomplete="pseudo" autofocus>
                                <p class="font-italic text-muted">Warning - Your username should contain your family name.</p>
                                @error('pseudo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="pseudo" type="text"
                                    class="form-control @error('pseudo') is-invalid @enderror" name="pseudo"
                                    value="{{Auth::user()->firstname}}" autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{Auth::user()->email}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Save changes") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header" style="background: #23282E!important; color: white!important">Delete your account</div>
                <div class="card-body">
                    <form action="{{ route('account.destroy', $user->id) }}" method="DELETE">
                        @csrf
                        <div class="border-bottom mb-2 pb-2">
                            <button type="submit" class="btn btn-transparent p-2 btn-lg btn-block" onclick="if(confirm('Do you really want delete your account ?')){
                                            return true;}else{ return false;}">Delete my account</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection