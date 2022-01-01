<x-adminGuest-layout>
<div class="row justify-content-center mt-5">
    <div class="col-xl-5 col-lg-6 col-md-10">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="app-brand">
                    <a href="/index.html">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>
                        <span class="brand-name">Sleek Dashboard</span>
                    </a>
                </div>
            </div>
            <div class="card-body p-5">

                <h4 class="text-dark mb-5">Sign In</h4>

                <x-jet-validation-errors class="mb-4 text-danger" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12 mb-4">
                            <input type="email" name="email" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="Email" :value="old('email')" required autofocus>
                        </div>
                        <div class="form-group col-md-12 ">
                            <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required autocomplete="current-password">
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex my-2 justify-content-between">
                                <div class="d-inline-block mr-3">
                                    <label class="control control-checkbox">Remember me
                                        <input type="checkbox" name="remember"/>
                                        <div class="control-indicator"></div>
                                    </label>

                                </div>
                                @if(Route::has('password.request'))
                                <p><a class="text-blue" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign In</button>
                            <p>Don't have an account yet ?
                                <a class="text-blue" href="{{ route('register') }}">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-adminGuest-layout>