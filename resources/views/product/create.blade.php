<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    @auth
                    <div class="container my-5">
                        <h1 class="mb-3">Add New Product</h1>
                        @if (session('status'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>
                            <div>
                                {{ session('status') }}
                            </div>
                        </div>
                        @endif

                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- "code":"01000",
                            "name":"Wahana Honda Gunung Sahari",
                            "address":"Jalan Gunung Sahari",
                            "phone_number":"085800000000",
                            "distance":5.2 --}}

                            <div class="mb-3">
                                <label for="productCode" class="form-label">Product Code</label>
                                <input type="number" class="form-control" id="productCode" name="code"
                                    placeholder="01000" required>
                            </div>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="name"
                                    placeholder="Wahana Honda Gunung Sahari" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Jalan Gunung Sahari" required>
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phoneNumber" name="phone_number"
                                    placeholder="085200000000" required>
                            </div>
                            <div class="mb-3">
                                <label for="distance" class="form-label">Distance</label>
                                <input type="number" step="0.01" class="form-control" id="distance" name="distance"
                                    placeholder="5.2" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>

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