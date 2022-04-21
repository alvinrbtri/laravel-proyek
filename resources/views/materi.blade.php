@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">

                <h1 class="mb-3">{{ $materi->judul }}</h1>
            
                <p>Oleh. <a href="/materis?author={{ $materi->author->username }}" class="text-decoration-none"></a>{{  
                $materi->author->name }}</a> in <a href="/materis?kategori={{ $materi->kategori->slug }}"
                class="text-decoration-none">{{ $materi->kategori->name }} </a></p>

                @if ($materi->image)
                <div style="max-height: 350px; overflow:hidden">
                    <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ 
                        $materi->kategori->name }}" class="img-fluid">
                </div>
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ 
                    $materi->kategori->name }}" alt="{{ $materi->kategori->name }}" class="img-fluid">
                @endif

                <article class="my-3">
                    {!! $materi->body !!}
                </article>
        
                <a href="/materis" class="d-block mt-3">Kembali ke halaman sebelumnya</a>
                
            </div>
        </div>
    </div>

@endsection