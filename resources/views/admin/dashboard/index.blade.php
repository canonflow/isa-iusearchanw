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
            @error('grand_total')
                <div class="alert alert-danger" role="alert">
                    <span class="fw-bold">{{ $message }}</span>
                </div>
            @enderror
            <h1 class="text-center">DAFTAR TRANSAKSI</h1>
            <h3 class="text-center">{{auth()->user()->admin->name}}</h3>
            <h5 class="text-center">Admin</h5>
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.add.user.index') }}" class="btn btn-primary">Tambah User</a>
                <div class="d-flex gap-4">
                    <a class="btn btn-success" href="{{ route('admin.daftar.dokter') }}">Daftar Dokter</a>
                    <a class="btn btn-warning" href="{{ route('admin.daftar.pasien') }}">Daftar Pasien</a>
                </div>
                <a href="{{ route('admin.add.idcard.index') }}" class="btn btn-info">Buat ID Card</a>
            </div>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Doctor</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Temu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($janjiTemu as $jt)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$jt->doctor->name}}</td>
                            <td>{{$jt->patient->name}}</td>
                            <td>{{$jt->keluhan}}</td>
                            <td>{{$jt->tgl_temu}}</td>
                            <td>
                                @if(count($jt->nota()->get())==0)
                                <button type="button" class="btn btn-warning" onclick="openModalBuatNota('{{ $jt->id }}')">Buat Nota</button>
                                @else
                                <a
                                    href="{{ route('admin.nota.print', ['janjiTemu' => $jt->id]) }}"
                                    class="btn btn-success"
                                    target="_blank"
                                >
                                    Print Nota
                                </a>
                                @endif
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Buat Nota -->
    <div class="modal fade" id="modalBuatNota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Buat Nota</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="formModalBuatNota" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text fw-semibold" id="addon-wrapping">Grand Total</span>
                            <input type="text" class="form-control" name="grand_total" placeholder="Rp. xxx.xxx" aria-label="Grand Total" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script>
        const modalBuatNota = document.getElementById('modalBuatNota');
        const formModalBuatNota = document.getElementById('formModalBuatNota');
        const openModalBuatNota = (id) => {
            let action = `{{ route('admin.index') }}/${id}/nota`;
            formModalBuatNota.setAttribute('action', action);
            $("#modalBuatNota").modal('toggle');
        }

    </script>
@endsection
