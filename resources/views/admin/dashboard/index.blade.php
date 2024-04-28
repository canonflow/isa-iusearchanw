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
            @if(session()->has('listRiwayat'))
            <div class="alert alert-success" role="alert">
                {{session()->get('listRiwayat')}}
            </div>
            @endif
            <h1 class="text-center">DAFTAR TRANSAKSI</h1>
            <h3 class="text-center">{{auth()->user()->admin->name}}</h3>
            <h5 class="text-center">Admin</h5>
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
                                @if(Count($jt->nota()->get())==0)
                                <button type="button" class="btn btn-warning">Buat Nota</button>
                                @else
                                <button type="button" class="btn btn-success">Print Nota</button>
                                @endif
                            </td>
                        </tr>
                        @php($i++)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
