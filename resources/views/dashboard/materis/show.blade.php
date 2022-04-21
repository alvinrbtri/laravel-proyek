@extends('dashboard.layouts.main')

@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $materi->judul }}</h1>

            <a href="/dashboard/materis" class="btn btn-success"> <span data-feather="arrow-left"></span>
            Kembali ke halaman sebelumnya</a>
            <a href="/dashboard/materis/{{ $materi->slug }}/edit" class="btn btn-warning"> <span data-feather="edit"></span> Edit </a>
            <form action="/dashboard/materis/{{ $materi->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Data ini akan dihapus?')">
                  <span data-feather="x-circle"></span> Hapus </button>
            </form>
        
            @if ($materi->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ 
                    $materi->kategori->name }}" class="img-fluid mt-3">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ 
                $materi->kategori->name }}" alt="{{ $materi->kategori->name }}" class="img-fluid mt-3">
            @endif
                

            <article class="my-3">
                {!! $materi->body !!}
            </article>
            
        </div>
    </div>
</div>

@endsection