
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

                <p class="text-dark mb-5">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>

                @if (session('status') == 'verification-link-sent')
                    <div class="text-success">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12 mb-4">
                            <input type="email" name="email" class="form-control input-lg" id="email" aria-describedby="emailHelp" placeholder="Email" :value="old('email')" required autofocus>
                        </div>
                        <div class="col-md-12">
                            
                            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Resend Verification Email</button>
                            <p>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-adminGuest-layout>
