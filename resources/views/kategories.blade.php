@extends('layouts.main')

@section('container')
    <h1 class="mb-5"> Kategories</h1>


    <div class="container">
        <div class="row">
            
        @foreach ($kategories as $kategori)  
        <div class="col-md-4 mt-3">
            <a href="/materis?kategori={{ $kategori->slug }}">
            <div class="card bg-dark text-white">
                <img src="https://source.unsplash.com/500x400/?{{ $kategori->name }}" 
                class="card-img" alt="...">
                <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.8)">card</h5>
                </div>
            </div>
            </a>
        </div>
        @endforeach
        </div>
    </div>


@endsection