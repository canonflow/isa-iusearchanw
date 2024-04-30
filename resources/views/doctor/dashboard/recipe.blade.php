@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error ('name')
            <div class="alert alert-danger" role="alert">
                <span class="fw-bold">{{ $message }}</span>
            </div>
            @enderror
            @error ('note')
            <div class="alert alert-danger" role="alert">
                <span class="fw-bold">{{ $message }}</span>
            </div>
            @enderror
            <div class="card">
                <div class="card-header bg-light">
                    <a href="{{ route('doctor.index') }}" class="btn btn-warning mt-2 mb-6">Kembali</a>
                    <h1 class="text-center mt-3">Resep untuk Pasien {{ $janjiTemu->patient->name }}</h1>
                    <br>
                    <h5>Dr. {{ auth()->user()->doctor->name }}</h5>
                </div>
                <div class="card-body">
                    {{-- {{ route('patient.create-janjitemu') }} --}}
                    <form action="{{route('doctor.recipe.store', ['janjiTemu'=>$janjiTemu])}}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <br>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-12">
                            <label for="note" class="form-label">Note Resep</label>
                            <br>
                            <textarea name="note" id="note" cols="150" rows="10">{{ old('note') }}</textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js') }}/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#note',
            toolbar1: 'newdocument | undo | redo | bold | italic | underline | strikethrough | alignleft | aligncenter | alignright | alignjustify |  fontselect | fontsizeselect ',
            toolbar2: 'cut | copy | paste | bullist | numlist | outdent | indent | blockquote | removeformat | subscript | superscript',
            relative_urls: false,
            document_base_url: '{{ asset('.') }}',
            paste_data_images: true,
        });
    </script>
@endsection
