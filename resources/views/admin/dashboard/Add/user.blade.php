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
            @error('name')
            <div class="alert alert-danger" role="alert">
                <span class="fw-bold">{{ $message }}</span>
            </div>
            @enderror
            @error('username')
                <div class="alert alert-danger" role="alert">
                    <span class="fw-bold">{{ $message }}</span>
                </div>
            @enderror
            @error('password')
                <div class="alert alert-danger" role="alert">
                    <span class="fw-bold">{{ $message }}</span>
                </div>
            @enderror
            @error('role')
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
                    <h1 class="text-center">Form Tambah</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.add.user.store') }}" class="row g-3" method="post">
                        @csrf
                        <div class="col-12 col-lg-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required value="{{ old('username') }}">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <label class="fw-light text-danger">Min: 8, Max:20</label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" id="role" name="role" required>
                                <option selected disabled>-- Pilih Role --</option>
                                <option value="dokter">Doctor</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
