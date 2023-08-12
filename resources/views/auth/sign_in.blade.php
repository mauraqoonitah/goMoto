<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')


    <main>
        @if(Auth::check())
        <h5>{{Auth::user()->email ?? ''}}</h5>
        @else
        <section class="form-signin w-100 m-auto py-5 my-5" id="signin">
            <form method="POST" action="{{ route('storeLogin') }}" enctype="multipart/form-data">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                        name="password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

                <div class="d-flex flex-row mb-3 align-items-center">
                    <div class="mt-2 pt-3 me-2 ">Don't have an account?
                    </div>
                    <div class="mt-2 pt-3 ">
                        <button type="button" class="btn ps-0 text-primary" data-bs-toggle="modal"
                            data-bs-target="#modalSignUp">
                            Sign up
                        </button>
                    </div>
                </div>


            </form>
        </section>
        <section>
            <!-- Modal -->
            <div class="modal fade" id="modalSignUp" tabindex="-1" aria-labelledby="modalSignUpLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <section class="form-signin w-100 m-auto pb-5" id="signin">
                                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h1 class="h3 mb-3 fw-normal">Create your account</h1>

                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInputName"
                                            placeholder="Your Name" name="name">
                                        <label for="floatingInputName">Name</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="floatingInput"
                                            placeholder="name@example.com" name="email">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword"
                                            placeholder="Password" name="password">
                                        <label for="floatingPassword">Password</label>
                                    </div>
                                    <p class="small text-secondary mt-3">By signing up, you agree to the Terms of
                                        Service and
                                        Privacy Policy, including
                                        Cookie Use. </p>
                                    <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
                                </form>
                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        @endif
    </main>


    @include('components.footer')
</body>

</html>