@extends('login-master')
@section('content')
    <div class="container align-items-center d-flex" style="height: 720px !important">
        <div class="card p-5 lg-w-25 m-auto ">
            <form action="{{route('auth.create')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Name</label>
                    <input type="text" class="form-control" name="nama" id="formGroupExampleInput"
                        placeholder="Masukan name...">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="formGroupExampleInput"
                        placeholder="Masukan email...">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="formGroupExampleInput2"
                        placeholder="Masukan password...">
                </div>
                <button type="submit" class="btn btn-primary my-2 w-100">Register</button>
                <a href="{{ url('auth/google') }}" class="btn btn-danger my-2 w-100" >Register With Google</a>
                <p class="text-center">Sudah punya akun? <a href="{{route('login')}}">Login</a></p>
            </form>
        </div>
    </div>
@endsection
