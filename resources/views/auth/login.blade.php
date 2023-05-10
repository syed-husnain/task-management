@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Login</div>

                    <div class=" card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6" id="show_hide_password">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('Login As') }}</label>
                        <div class="col-md-6">
                            <input type="radio" name="user_type" value="admin"> Admin<br>
                            <input type="radio" name="user_type" value="vendor"> Vendor<br>
                            @if ($errors->has('user_type'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_type') }}</strong>
                            </span>
                            @endif
                        </div>
                </div> --}}

                            <div class="form-group row">
                                {{-- <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>
                    --}}
                                <div class="col-md-6">
                                    <input type="hidden" name="user_type" value="admin">
                                    {{-- <select name="user_type" id="user_type"
                                class="form-control {{ $errors->has('user_type') ? ' is-invalid' : '' }}" required>
                        <option value="">Select User Type</option>
                        <option value="super_admin">Super Admin</option>
                        <option value="admin">Admin</option>
                        </select> --}}
                                    @if ($errors->has('user_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('user_type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Forgot Password') }}
                </label>
            </div>
        </div>
    </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
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
@section('script')
    <script>
        $(document).ready(function() {
            $("#show_hide_password span").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password span').addClass("fa-eye-slash");
                    $('#show_hide_password span').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password span').removeClass("fa-eye-slash");
                    $('#show_hide_password span').addClass("fa-eye");
                }
            });
        });
    </script>
@endsection
