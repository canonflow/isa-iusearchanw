@extends('admin.layouts.index')

@section('styles')
    <style>
        #content1 {
            padding: 1px 30px;
        }

        .table-responsive {
            flex-direction: column;
            align-items: center;
            padding: 10px 10px;
            margin: 25px 25px;
            background-color: white;
        }

        h1 {
            margin: 25px 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-weight: bold;
        }

        th,
        td {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="form">
        <h1>List Patient</h1>

        <div class="container mt-3">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="{{ route('admin.index') }}" class="btn btn-primary mb-4">Kembali</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Pencarian" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table">
                <table class="table caption-top">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                        @foreach ($patients as $patient)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $patient->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($patient->birth_date)) }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>
{{--                                    <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                                        <button type="button" class="btn btn-primary">Edit</button>--}}
{{--                                        <form action="{{ route('admin.destroy.patient', ['patient' => $patient->id]) }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="button" class="btn btn-danger">Hapus</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                    <div class="modal fade" id="modalHapus.{{ $patient->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pasien</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                    <form action="{{ route('admin.destroy.patient', ['patient' => $patient->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger mt-3" type="submit">Ya, saya yakin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus.{{ $patient->id }}">Hapus</button>
                                </td>
                            </tr>
                            @php($i++)
                        @endforeach
                    </tbody>
                </table>
            </table>
        </div>
    </div>
@endsection
