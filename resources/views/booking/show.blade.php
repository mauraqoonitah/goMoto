<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <div class="container my-5">
                        <a href="{{route('index')}}">Back</a>
                        <h1 class="my-3">My Booking</h1>
                        @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>
                            <div>
                                {{ session('success') }} Click <a href="#" class="alert-link">here</a> to see
                                details.
                            </div>
                        </div>
                        @endif

                        @php
                        $bulan = ['', 'JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEPT','OKT','NOV','DEC'];

                        @endphp

                        <div class="row ">
                            @foreach ($bookings as $booking)
                            @php
                            $parsed_date_updated_at = Carbon\Carbon::parse($booking->book_date)->toDateString();
                            $date_updated_at = explode("-", $parsed_date_updated_at);
                            $updated_at_year = $date_updated_at[0];
                            $updated_at_locale_month = ltrim($date_updated_at[1], '0');
                            $updated_at_month = $bulan[$updated_at_locale_month];
                            $updated_at = $date_updated_at[2] . ' ' . $updated_at_month . ' ' . $updated_at_year;
                            @endphp

                            <div class="col-6">
                                <a href="{{route('booking.edit', $booking->id)}}"
                                    class="card text-decoration-none mb-3 bg-body-tertiary p-0 m-0">
                                    <div class="card-body row p-0 m-0 " id="card-hover">
                                        <div class="col-8 ">
                                            <div class="p-2">
                                                <div class="fs-6 lead">Workshop</div>
                                                <div class="fs-6 fw-bold" style="height:44px;">
                                                    {{$booking->workshops->name}}</div>
                                            </div>
                                            <div class="p-2">
                                                <div class="fs-6 lead">Booking ID</div>
                                                <div class="fs-6">{{$booking->booking_number}}</div>
                                            </div>
                                            <div class="p-2">
                                                <form method="post" action="{{route('booking.destroy',$booking->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you sure to delete data?');">Cancel
                                                        Booking</button>
                                                </form>

                                            </div>

                                        </div>
                                        <div
                                            class="col-4 bg-dark-subtle p-0 m-0 d-flex align-items-center justify-content-center">
                                            @php
                                            $date = \Carbon\Carbon::parse($booking->book_date);
                                            $day = $date->day;
                                            $month = $date->month;
                                            $year = $date->year;
                                            @endphp
                                            <div class="p-2 text-center">
                                                <p class="fs-6 m-0 fw-bold">{{$updated_at_month}}</p>
                                                <p class="fs-4 fw-bolder text-dark m-0">{{$date_updated_at[2]}}</p>
                                                <p class="fs-6 m-0 fw-bold">{{$year}}</p>

                                            </div>

                                        </div>
                                        {{-- <h5 class="card-title fw-bolder mb-3"><i
                                                class="fa-solid fa-motorcycle me-2 text-secondary"></i>{{$motorcycle->name}}
                                        </h5>
                                        <h6 class="card-subtitle mb-4 fw-light">ut_code: {{$motorcycle->ut_code}}
                                        </h6>
                                        --}}

                                        {{-- <form action="{{route('booking.store', $motorcycle->id)}}" method="POST"
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
                                        </form> --}}
                                    </div>
                                </a>
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