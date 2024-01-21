@extends('welcome')
@section('content')
    @include('page.navbar')
    <div class="container mt-5">
        <div class="text-center">
            <h1>Jadikan setiap koneksi berarti</h1>
            <h5>Buat tautan pendek, Kode QR, dan halaman Tautan di bio. Bagikan di mana saja.
                Lacak apa yang berhasil dan apa yang tidak. Semua di dalam Platform Koneksi short link .</h5>
            <div class="card bg-dark border-white p-3 mb-5 w-lg-50 m-auto mt-5">
                @if (session('success'))
                    <div class="alert alert-primary">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('create.short') }}" method="post">
                    @csrf
                    <input class="form-control form-control-lg text-center" name="url" required type="url"
                        placeholder="Paste url ...">
                    @error('url')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="row my-2">
                        <div class="col">
                            <input type="text" required disabled readonly name="host" value="{{ url('/') }}"
                                class="form-control form-control-lg opacity-50 bg-secondary"
                                placeholder="{{ url('/') }} /">
                            @error('host')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col">
                            <input type="text" required class="form-control form-control-lg" name="short"
                                placeholder="short-link" aria-label="Last name">
                            @error('short')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Create Link</button>
                </form>
            </div>
            @if (Auth::user())
                @include('page.card-short')
            @endif
        </div>

    </div>
@endsection
