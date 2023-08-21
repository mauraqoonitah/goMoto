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
                        <a href="{{route('workshop.index')}}">Back</a>
                        <h1 class="my-3">Show Products</h1>
                        <p class="fw-bold"><i class="fa-solid fa-location-dot me-2"></i>Workshop: {{$workshops->name}},
                            {{$workshops->address}}</p>
                        @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                        @endif
                        <button type="button" class="btn btn-sm btn-success mb-3" data-bs-toggle="modal"
                            data-bs-target="#modalAddProduct">
                            <i class="fa-solid fa-plus me-2"></i>Add New Product for this
                            Workshop
                        </button>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">ut_code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($workshops->motorcycles as $key => $motorcycle)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$motorcycle->ut_code}}</td>
                                        <td>{{$motorcycle->name}}</td>
                                        <td>
                                            <div class="">
                                                <button type="button" class="btn btn-sm btn-warning mb-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalEditProduct_{{$motorcycle->id}}">
                                                    <i class="fa-solid fa-pencil me-2"></i>
                                                </button>

                                                <form method="post"
                                                    action="{{route('motorcycle.destroy',$motorcycle->id)}}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('Are you sure to delete data?');"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Modal Edit Product -->
                                    <div class="modal fade" id="modalEditProduct_{{$motorcycle->id}}" tabindex="-1"
                                        aria-labelledby="modalEditProduct_{{$motorcycle->id}}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <section class="p-2 w-100 m-auto pb-5">

                                                        <form action="{{route('motorcycle.update', $motorcycle->id)}}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('put')
                                                            @csrf

                                                            <h1 class="h3 mb-1 fw-normal">Edit Product</h1>

                                                            <p class="fw-bold small mb-3s">{{$motorcycle->name}}</p>

                                                            <div class="form-control">
                                                                <div class="mb-3">
                                                                    <label for="name" class="fw-bold mb-2">Product
                                                                        Name</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                        value="{{$motorcycle->name}}" name="edit_name">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="ut_code" class="fw-bold mb-2">Product
                                                                        ut_code</label>
                                                                    <input type="text" class="form-control" id="ut_code"
                                                                        value="{{$motorcycle->ut_code}}"
                                                                        name="edit_ut_code">
                                                                </div>
                                                                <button class="btn btn-primary w-100 py-2 my-3"
                                                                    type="submit"><i
                                                                        class="fa-solid fa-floppy-disk me-2"></i>Save
                                                                </button>
                                                            </div>


                                                        </form>
                                                    </section>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

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

                    <section>
                        <!-- Modal Add Product -->
                        <div class="modal fade" id="modalAddProduct" tabindex="-1"
                            aria-labelledby="modalAddProductLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <section class="p-2 w-100 m-auto pb-5">
                                            <form method="POST" action="{{ route('motorcycle.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="workshop_id" value="{{$workshops->id}}">
                                                <h1 class="h3 mb-3 fw-normal">Add New Product</h1>
                                                @if($errors->any())
                                                {!! implode('', $errors->all('<div class="text-danger mb-2">:message
                                                </div>')) !!}
                                                @endif
                                                <div class="form-control">
                                                    <div class="mb-3">
                                                        <label for="name" class="fw-bold mb-2">Product Name</label>
                                                        <input type="text" class="form-control" id="name"
                                                            placeholder="BEAT SPORTY CBS MMC" name="name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="ut_code" class="fw-bold mb-2">Product
                                                            ut_code</label>
                                                        <input type="text" class="form-control" id="ut_code"
                                                            placeholder="HH1B02N41S1 A/T" name="ut_code" required>
                                                    </div>
                                                    <button class="btn btn-primary w-100 py-2 my-3" type="submit"><i
                                                            class="fa-solid fa-floppy-disk me-2"></i>Save
                                                    </button>
                                                </div>
                                            </form>
                                        </section>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>