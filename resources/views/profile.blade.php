<!doctype html>
<html lang="en">

@include('components.header')

<body>
    @include('components.navbar')

    <main>
        <div class="container my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <h3 class="fw-bold mb-3">Edit Profile</h3>
                    @if (session('status'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="fa-regular fa-circle-check me-2"></i>
                        <div>
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('editProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{$user->email}}" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="col-form-label fw-bold">Profile Picture</label>
                            <div class="col-sm-10">
                                @if($user->avatar)
                                <img src="{{asset('storage/'.$user->avatar)}}" alt="avatar" title="avatar" width="100"
                                    class="mb-2" />
                                <br>
                                @endif
                                <input type="file" id="avatar" name="avatar">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </main>

    @include('components.footer')
</body>

</html>