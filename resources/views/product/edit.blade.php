<!doctype html>
<html lang="en" data-bs-theme="auto">

{{-- @include('components.header') --}}

<body>
    {{-- @include('components.navbar') --}}

    <main>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    @auth
                    <div class="container my-5">
                        <h1 class="mb-3">Edit Product</h1>

                        <form action="{{route('product.update', $product->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label for="productCode" class="form-label">Product Code</label>
                                <input type="number" class="form-control" id="productCode" name="code"
                                    value="{{$product->code}}">
                            </div>
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="name"
                                    value="{{$product->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{$product->address}}">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phoneNumber" name="phone_number"
                                    value="{{$product->phone_number}}">
                            </div>
                            <div class="mb-3">
                                <label for="distance" class="form-label">Distance</label>
                                <input type="number" step="0.01" class="form-control" id="distance" name="distance"
                                    value="{{$product->distance}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>

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

    {{-- @include('components.footer') --}}
</body>

</html>