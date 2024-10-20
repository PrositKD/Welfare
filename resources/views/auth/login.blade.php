{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/icons/icon-48x48.png')}}" />
    <link href="{{asset('assets/css/light.css')}}" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-4 col-lg-4 col-xl-4 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="card">
                            <div class="text-center mt-4">
                                <h1 class="h2">Login Page</h1>
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>
                            <hr class="m-0">
							<div class="card-body">
                                

								<div class="m-sm-2">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
									<form method="POST" action="{{ route('login') }}">
                                        @csrf
                        
										<div class="mb-3">
											<label class="form-label">{{ __('Email') }}</label>
											<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}" required autofocus autocomplete="username">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
										</div>

										<div class="mb-3">
											<label class="form-label">{{ __('Password') }}</label>
											<input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" >

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            
                                            @if (Route::has('password.request'))
                                                <small>
                                                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                                                </small>
                                            @endif
										</div>

										<div class="d-grid gap-2 mt-3">
											<button class="btn btn-lg btn-primary" type="submit">Login</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>
