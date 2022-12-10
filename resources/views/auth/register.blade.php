@extends('layouts.app')
@section('content')
    <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/h6.jpg)"></div>
        <div class="content">
            <div class="container" style="padding-bottom: 10vh">
                <div class="row align-items-center">
                    <div class="col-6 mr-auto ml-auto card" style="background-color:white; padding:30px; padding-bottom:5px">
                        <h1 style="color:black"><strong>SIGN UP</strong></h1>
                        <div class="card card-signup card-plain">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons users_circle-08"></i>
                                            </span>
                                        </div>
                                        <input id="name" placeholder="Nama" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons ui-1_email-85"></i>
                                            </span>
                                        </div>
                                        <input id="email" placeholder="Email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

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
                                        <input id="password" placeholder="Kata Sandi" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group no-border input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="now-ui-icons objects_key-25"></i>
                                            </span>
                                        </div>
                                        <input id="password-confirm" placeholder="Konfirmasi Katasandi" type="password"
                                            class="form-control" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-success btn-round btn-lg btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-default" style="color: black">
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
