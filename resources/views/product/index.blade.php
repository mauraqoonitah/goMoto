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
                        <h1 class="mb-3">Show Products</h1>
                        @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                        @endif
                        <form action="{{route('product.create')}}" method="GET" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-success mb-3">Add Product</button>
                        </form>


                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Distance</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->address}}</td>
                                        <td>{{$product->phone_number}}</td>
                                        <td>{{$product->distance}}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-block">

                                                <a href="{{route('product.edit',$product->id)}}"
                                                    class="btn btn-warning"><i class="fa-solid fa-pencil"></i>
                                                </a>

                                                <form method="post" action="{{route('product.destroy',$product->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you sure to delete data?');"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


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