<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 text-center bg-body-tertiary">
            <div class="col-md-8 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold">GoMoto</h1>
                <h3 class="fw-normal text-muted mb-3">The largest digital platform for motor-enthusiasts of all riding
                    styles.</h3>
                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    {{-- <a class="icon-link" href="#signin">
                        Sign in
                        <svg class="bi">
                            <use xlink:href="#chevron-right" />
                        </svg>
                    </a> --}}
                    <a class="icon-link" href="#shopnow">
                        Shop Now
                        <svg class="bi">
                            <use xlink:href="#chevron-right" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3" id="shopnow">
            <div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 py-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-body-tertiary shadow-sm mx-auto"
                    style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
            </div>
            <div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="my-3 p-3">
                    <h2 class="display-5">Another headline</h2>
                    <p class="lead">And an even wittier subheading.</p>
                </div>
                <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                </div>
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>