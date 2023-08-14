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
                        <h1 class="mb-3">Show Workshops</h1>
                        @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <i class="fa-regular fa-circle-check me-2"></i>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                        @endif
                        <form action="{{route('workshop.create')}}" method="GET" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-success mb-3">Add Workshop</button>
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
                                    @foreach ($workshops as $key => $workshop)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$workshop->code}}</td>
                                        <td>{{$workshop->name}}</td>
                                        <td>{{$workshop->address}}</td>
                                        <td>{{$workshop->phone_number}}</td>
                                        <td>{{$workshop->distance}}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-block">

                                                <a href="{{route('workshop.edit',$workshop->id)}}"
                                                    class="btn btn-warning"><i class="fa-solid fa-pencil"></i>
                                                </a>

                                                <form method="post"
                                                    action="{{route('workshop.destroy',$workshop->id)}}">
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