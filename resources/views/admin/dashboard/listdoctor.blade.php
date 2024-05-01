@extends('admin.layouts.index')

@section('styles')
    <style>
        .card {
            display: flex;
            flex-direction: column;
            align-items: left;
            /*border: 5px solid black;*/
            /*border-radius: 7px;*/
            padding: 10px 30px;
            margin: 25px 25px;
            background-color: white;
        }

        h5{
            font-weight: bold;
        }

    </style>
@endsection

@section('content')
    <div class="container p-4">
        <div class="form px-5">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
            @foreach($doctors as $doctor)
                <div class="card">
                    <img src="{{asset('images/doctor3.jpg')}}" width="25%" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$doctor->name}}</h5>
                        <p class="card-text">Dokter Umum <br>20 years experience</p>
                        <p class="card-text"> <small class="text-body-secondary">Surabaya, Jawa Timur</small></p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <div class="modal fade" id="modalHapus.{{ $doctor->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Dokter</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin?
                                            <form action="{{ route('admin.destroy.doctor', ['doctor' => $doctor->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mt-3" type="submit">Ya, saya yakin</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus.{{ $doctor->id }}">Hapus</button>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
