@extends('layouts.app')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif
            @if(session()->has('failed'))
                <div class="alert alert-danger" role="alert">
                    {{session()->get('failed')}}
                </div>
            @endif
            @error('username')
            <div class="alert alert-danger" role="alert">
                <span class="fw-bold">{{ $message }}</span>
            </div>
            @enderror
            <h1 class="text-center">Tambah User</h1>
            <h3 class="text-center">{{auth()->user()->admin->name}}</h3>
            <h5 class="text-center">Admin</h5>
            <a href="{{ route('admin.index') }}" class="btn btn-primary mb-3">Back</a>
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class="text-center">Form Buat ID Card</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.add.idcard.store') }}" class="row g-3" method="post">
                        @csrf
                        <div class="col-12">
                            <label for="username" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" id="username" name="username" required>
                                <option selected disabled>-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->username }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-success">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
