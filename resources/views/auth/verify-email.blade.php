<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        @auth
        <div class="container my-3">
            <div class="row d-flex justify-content-center">
                <div class="col-8">
                    <p class="fs-4 mb-0">Hi, {{Auth::check() ? Auth::user()->name : ''}}!</p>
                    <p class="small text-secondary">{{Auth::check() ? Auth::user()->email : ''}}</p>
                </div>
                <hr>
            </div>
        </div>
        @endauth

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-8 ">
                    <div class="mb-4 text-sm text-gray-600">
                        <p class="fs-4">Verify your email address</p>
                        <p class="mb-3">Thanks for signing up! Before getting started, could you verify your email
                            address by
                            clicking on the link we just emailed to you?</p>
                    </div>
                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-2 fw-bolder font-medium text-sm text-green-600 small"><i>
                            {{ __('A new verification link has been sent to the email address you provided during
                            registration.') }}</i>
                    </div>
                    @endif


                    <div class="flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <p class="small">If you didn't receive the email, we will gladly send you
                                    another.</p>
                                <button type="submit"
                                    class="btn btn-sm btn-dark mb-2 border-text-sm border text-gray-600 hover:text-gray-900 small">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class="btn btn-sm small mb-2 text-sm text-gray-600 hover:text-gray-900">
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