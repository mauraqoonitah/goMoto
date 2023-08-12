<!doctype html>
<html lang="en" data-bs-theme="auto">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container my-3">
            <p class="fs-4">Hi, {{Auth::check() ? Auth::user()->name : ''}}!</p>
            <p class="">{{Auth::check() ? Auth::user()->email : ''}}</p>
        </div>
    </main>

    @include('components.footer')
</body>

</html>