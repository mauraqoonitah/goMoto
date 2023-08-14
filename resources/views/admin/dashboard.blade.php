<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container" style="height:70vh;">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    @auth
                    <div class="container my-5">
                        <h1>Dashboard Admin</h1>
                        <h2 class="">Hi, {{Auth::check() ? Auth::user()->name : ''}}!</h2>
                        <p class="">{{Auth::check() ? Auth::user()->email : ''}}</p>
                        <p class="lead">Only admin can access this section.</p>
                        <hr>
                        <form action="{{route('workshop.index')}}" method="GET" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-primary mb-3">Show Workshop</button>
                        </form>
                    </div>
                    @endauth

                    @guest
                    <h1>Homepage</h1>
                    <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
                    @endguest

                    @if (request()->routeIs('profile'))
                    <button type="button" class="btn btn-primary">Edit Profile</button>
                    @endif
                </div>
            </div>
        </div>

    </main>

    @include('components.footer')
</body>

</html>