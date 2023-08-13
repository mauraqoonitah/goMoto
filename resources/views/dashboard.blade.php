<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        @auth
        <div class="container my-3">
            <h1 class="">Hi, {{Auth::check() ? Auth::user()->name : ''}}!</h1>
            <p class="">{{Auth::check() ? Auth::user()->email : ''}}</p>
            <p class="lead">Only authenticated users can access this section.</p>
        </div>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest


    </main>

    @include('components.footer')
</body>

</html>