<!doctype html>
<html lang="en">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <div class="container my-5">
                        <a href="{{route('index')}}">Back</a>
                        <h1 class="my-3">Booking Service</h1>
                        <p class="fw-bold"><i class="fa-solid fa-location-dot me-2"></i>Workshop: {{$workshops->name}},
                            {{$workshops->address}}</p>
                        @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>
                            <div>
                                {{ session('success') }} Click <a href="{{route('booking.show', Auth::user()->id)}}"
                                    class="alert-link">here</a>
                                to see
                                details.
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            @foreach ($workshops->motorcycles as $motorcycle)
                            <div class="col-6">
                                <div class="card mb-3 p-2">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bolder mb-3"><i
                                                class="fa-solid fa-motorcycle me-2 text-secondary"></i>{{$motorcycle->name}}
                                        </h5>
                                        <h6 class="card-subtitle mb-4 fw-light">ut_code: {{$motorcycle->ut_code}}</h6>

                                        <form action="{{route('booking.store', $motorcycle->id)}}" method="POST"
                                            enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <input type="hidden" name="workshop_id" value="{{$workshops->id}}">
                                            <input type="hidden" name="motorcycle_id" value="{{$motorcycle->id}}">

                                            <div class="row">
                                                <div class="col-12 row">
                                                    <div class="col-7 px-0 mx-0">
                                                        <div class="d-grid gap-2">
                                                            <button
                                                                class="btn bg-body-tertiary border border-end-0 fw-semibold"
                                                                type="submit"
                                                                onclick="return confirm('Are you sure to book this?');"
                                                                style="border-radius: 5px 0 0 5px;">Book
                                                                Now</button>
                                                        </div>

                                                    </div>
                                                    <div class="col-5 px-0 mx-0">
                                                        <input type="date" id="book_date" name="book_date"
                                                            class="border border-start-0" required>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>



                </div>
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>