@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-4">
                <div class="card">
                    <div class="card-header">Login with ID Card</div>
                    <div class="card-body">
                        @error('card')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @if(session()->has('cardRejected'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('cardRejected') }}
                            </div>
                        @endif
                        <form action="{{ route('login.id-post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="card" class="col-md-4 col-form-label text-md-end">{{ __('ID Card') }}</label>

                                <div class="col-md-6">
                                    <input id="card" type="file" class="form-control @error('card') is-invalid @enderror" name="card" required autofocus>

                                    @error('card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
