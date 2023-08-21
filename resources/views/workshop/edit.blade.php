<!doctype html>
<html lang="en">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    @auth
                    <div class="container my-5">
                        <a href="{{route('workshop.index')}}" class="my-3">Back</a>
                        <h1 class="mb-3">Edit workshop</h1>

                        <form action="{{route('workshop.update', $workshop->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label for="workshopCode" class="form-label">workshop Code</label>
                                <input type="number" class="form-control" id="workshopCode" name="code"
                                    value="{{$workshop->code}}">
                            </div>
                            <div class="mb-3">
                                <label for="workshopName" class="form-label">workshop Name</label>
                                <input type="text" class="form-control" id="workshopName" name="name"
                                    value="{{$workshop->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{$workshop->address}}">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phoneNumber" name="phone_number"
                                    value="{{$workshop->phone_number}}">
                            </div>
                            <div class="mb-3">
                                <label for="distance" class="form-label">Distance</label>
                                <input type="number" step="0.01" class="form-control" id="distance" name="distance"
                                    value="{{$workshop->distance}}">
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa-solid fa-floppy-disk me-2"></i>Submit</button>

                        </form>

                    </div>
                    @endauth

                    @guest
                    <h1>Homepage</h1>
                    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
                    @endguest
                </div>
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>