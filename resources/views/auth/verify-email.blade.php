<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        @auth
        <div class="container my-3">
            <p class="fs-4">Hi, {{Auth::check() ? Auth::user()->name : ''}}!</p>
            <p class="">{{Auth::check() ? Auth::user()->email : ''}}</p>
        </div>
        @endauth

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-8 ">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by
                        clicking on
                        the
                        link we just emailed to you? If you didn\'t receive the email, we will gladly send you
                        another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during
                        registration.') }}
                    </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <button type="submit"
                                    class="btn mb-2 btn-outline-light border-text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn mb-2 text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </main>
    @include('components.footer')
</body>

</html>