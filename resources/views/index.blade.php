<!doctype html>
<html lang="en">

@include('components.header')

<body class="bg-body-tertiary">
    @include('components.navbar')

    <main>
        <div class="position-relative overflow-hidden p-3 p-md-5 text-center ">
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

        <div class="container">
            <h2 class="text-center my-5">Booking Service</h2>

            <div class="row">
                @foreach ($workshops as $workshop)
                <div class="col-4">
                    <div class="card mb-3 p-2">
                        <div class="card-body">
                            <h5 class="card-title fw-bolder mb-3">{{$workshop->name}}</h5>
                            <h6 class="card-subtitle mb-2 fw-light">{{$workshop->address}}</h6>
                            <div class="card-subtitle mb-2 fw-light small text-secondary">{{$workshop->distance}}km
                            </div>

                            <div class="row bg-body-secondary rounded d-flex align-items-center my-4">
                                <div class="col-9">
                                    <p class="card-text">
                                        {{$workshop->phone_number}}</p>
                                </div>
                                <div class="col-3 px-3">
                                    <button type="button" class="btn btn-sm">
                                        <i class="fa-solid fa-square-phone-flip fs-2"></i>
                                    </button>
                                </div>

                            </div>

                            <a class="card-link text-decoration-none"
                                href="{{route('product.show', $workshop->id)}}">View Products <i
                                    class="fa-solid fa-chevron-right small"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>