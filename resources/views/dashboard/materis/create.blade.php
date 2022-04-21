@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Materi baru</h1>
</div> 

@if (session()->has('berhasil'))
<div class="alert alert-success" role="alert">
  {{ session('berhasil') }}
</div>
@endif
<div class="col-lg-8">
    <form method="post" action="/dashboard/materis" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul Materi</label>
          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" 
          name="judul" required autofocus value="{{ old('judul') }}">
          @error('judul')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug Materi</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
          name="slug" required value="{{ old('slug') }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori Materi</label>
          <select class="form-select" name="kategori_id">
            @foreach ($kategories as $kategori)
            @if (old('kategori_id') == $kategori->id)
             <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
            @else
             <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Upload Gambar</label>
          <input class="form-control @error('image') is-invalid @enderror" 
          type="file" id="image" name="image">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update Materi</button>
      </form>
</div>

<script>
  const judul = document.queryselector('#judul');
  const slug = document.queryselector('#slug');

  judul.addEventListener('change', function() {
    fetch('/dashboard/materis/checkSlug?judul=' + judul.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection

