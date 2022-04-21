@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center"> {{ $judul }} </h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/materis">
      @if (request('kategori'))
          <input type="hidden" name="kategori" value="{{ request('kategori') }}">
      @endif
      @if (request('author'))
          <input type="hidden" name="kategori" value="{{ request('author') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari..." name="cari" value="{{ request('cari') }}">
        <button class="btn btn-primary" type="submit" >Cari</button>
      </div>
    </form>
  </div>
</div>

@if ($materis->count())
    
<div class="card mb-3">
  @if ($materis[0]->image)
            <div style="max-height: 400px; overflow:hidden">
                <img src="{{ asset('storage/' . $materis[0]->image) }}" alt="{{ 
                    $materis[0]->kategori->name }}" class="img-fluid">
            </div>
            @else
              <img src="https://source.unsplash.com/1200x400/?{{ $materis[0]->kategori->name }}" 
              class="card-img-top" alt="{{ $materis[0]->kategori->name }}">
  @endif

    <div class="card-body text-center">
      <h3 class="card-title"><a href="/materis/{{ $materis[0]->slug }}" 
        class="text-decoration-none text-dark ">{{ $materis[0]->judul }}</a></h3>
        <p>
            <small class="text-muted">
            Oleh. <a href="/materis?author={{ $materis[0]->author->username }}"
            class="text-decoration-none"> {{ $materis[0]->author->name }}</a> in <a href="/
            materis?kategori={{ $materis[0]->kategori->slug }}"class="text-decoration-none"> {{ $materis[0]
            ->kategori->name }} </a>{{ $materis[0]->created_at->diffForHumans() }}
            </small>
        </p>

        <p class="card-text">{{ $materis[0]->excerpt }}</p>

        <a href="/materis/{{ $materis[0]->slug }}" class="text-decoration-none btn btn-primary">Selanjutnya...</a>
      
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($materis->skip(1) as $materi)

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgb(0, 0, 0, 0.8)">
                <a href="/materis?kategori={{ $materi->kategori->slug }}" class="text-white text-decoration-none">
                {{ $materi->kategori->name }}</a></div>
                @if ($materi->image)
                      <img src="{{ asset('storage/' . $materi->image) }}" alt="{{ 
                        $materi->kategori->name }}" class="img-fluid">
                @else
                      <img src="https://source.unsplash.com/1200x400/?{{ 
                      $materi->kategori->name }}" alt="{{ $materi->kategori->name }}" class="card-img-top" alt="{{ $materi->kategori->name }}">
                @endif
                
                <div class="card-body">
                  <h5 class="card-title">{{ $materi->judul }}</h5>
                    <p>
                    <small>
                    Oleh. <a href="/materis?author={{ $materi->author->username }}"
                    class="text-decoration-none"> {{ $materi->author->name }}</a> 
                    {{ $materi->created_at->diffForHumans() }}
                    </small>
                    </p>
        
                  <p class="card-text">{{ $materi->excerpt }}</p>
                  <a href="/materis/{{ $materi->slug }}" class="btn btn-primary">Selanjutnya...</a>
                </div>
              </div>
        </div>

        @endforeach
    </div>
</div>

@else
<p class="text-center fs-4">Tidak ada Materi.</p>
@endif

<div class="d-flex justify-content-center">
{{ $materis->links() }}
</div>

@endsection