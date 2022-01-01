

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
                <h4 class="text-dark mb-5">Reset Password</h4>

                <x-jet-validation-errors class="mb-4 text-danger" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="row">
                        <div class="form-group col-md-12 mb-4">
                            <!-- <input type="email" name="email" class="" id="email" aria-describedby="emailHelp" placeholder="Email" :value="old('email', $request->email)" required autofocus> -->
                            <x-jet-input id="email" class="form-control input-lg" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                        </div>
                        <div class="form-group col-md-12 ">
                            <input type="password" name="password" class="form-control input-lg" id="password" placeholder="Password" required autocomplete="new-password">
                        </div>
                        <div class="form-group col-md-12 ">
                            <input type="password" name="password_confirmation" class="form-control input-lg" id="password" placeholder="Password" required autocomplete="new-password">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-adminGuest-layout>