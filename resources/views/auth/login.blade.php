@extends('layouts.app')
@section('content')
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/h1.jpg)"></div>
        <div class="content">
            {{-- <div class="container">
                <h1><strong>LOGIN</strong></h1>
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-login card-plain">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card-header text-center">
                                <div class="logo-container">
                                    <img src="../assets/img/wanagis.png" alt="">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="now-ui-icons ui-1_email-85"></i>
                                        </span>
                                    </div>
                                    <input id="email" placeholder="Email Address" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group no-border input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                        </span>
                                    </div>
                                    <input id="password" placeholder="Password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-check">
                                    <label class="form-check-label" for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <span class="form-check-sign"></span>
                                        Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success btn-round btn-lg btn-block">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <div class="pull-right">
                                        <h6>
                                            <a href="{{ route('password.request') }}" class="btn btn-link">Forgot Your
                                                Password?</a>
                                        </h6>
                                    </div>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div> --}}
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 ml-auto mr-auto card" style="background-color: white; padding:30px; padding-bottom:5px">
                        <h1 style="color:black"><strong>LOGIN</strong></h1>
                        <div class="card card-login card-plain">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </span>
                                        </div>
                                        <input id="email" placeholder="Email Address" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                            </span>
                                        </div>
                                        <input id="password" placeholder="Password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check" style="color:black">
                                        <label class="form-check-label" for="remember">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <span class="form-check-sign" style="color:black"></span>
                                            Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success btn-round btn-lg btn-block">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <div class="pull-right">
                                            <h6>
                                                <a href="{{ route('password.request') }}" class="btn btn-link"
                                                    style="color:black">Forgot
                                                    Your
                                                    Password?</a>
                                            </h6>
                                        </div>
                                    @endif
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-default">
        <div class=" container">
            <nav>
                <ul>
                    <li>
                        <a href="/">
                            WANAGIS
                        </a>
                    </li>
                    <li>
                        <a href="https://linktr.ee/zaidanalfv">
                            About Me
                        </a>
                    </li>
                    <li>
                        <a href="https://zavault.postach.io/">
                            Blog
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright" id="copyright">
                &copy;
                <script>
                    document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>
                <a href="" target="_blank">Zaidan Al-ghifari Fahlevi</a>, All right reserved.
            </div>
        </div>
    </footer>
@endsection
