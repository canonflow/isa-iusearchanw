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
            <h1 class="text-center">JANJI TEMU PASIEN</h1>
            <h3 class="text-center">Dr. {{ auth()->user()->doctor->name }}</h3>
            <h5 class="text-center">Dokter Umum</h5>
            <a href="{{ route('doctor.janjiTemu') }}" class="btn btn-primary">Pilih Janji Temu Lainnya</a>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col" width="5%">Id</th>
                        <th scope="col" width="20%">Nama Pasien</th>
                        <th scope="col" width="20%">Keluhan</th>
                        <th scope="col" width="20%">Tanggal Temu</th>
                        <th scope="col" width="25%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($janjiTemu as $jt)
                    <tr>
                        <td width="5%">{{$i}}</td>
                        <td width="20%">{{$jt->patient->name}}</td>
                        <td width="20%">{{$jt->keluhan}}</td>
                        <td width="20%">{{$jt->tgl_temu}}</td>
                        <td width="25%">
                            @if($jt->service_id == null)
                                <a href="{{route("doctor.riwayat",["janjiTemu"=>$jt->id])}}" class="btn btn-success">Tambah Riwayat Pasien</a>
                            @else
                                <a target="_blank" href="{{ route('doctor.riwayat.print', ['janjiTemu' => $jt->id]) }}" class="btn btn-warning">Download Riwayat</a>
                            @endif
                            @if($jt->recipe_id == null && $jt->service_id != null)
                                <a href="{{ route('doctor.recipe.index', ['janjiTemu' => $jt->id]) }}" class="btn btn-info">Buat Resep</a>
                            @elseif($jt->service_id != null)
                                <a target="_blank" href="{{ route('doctor.recipe.print', ['janjiTemu' => $jt->id]) }}" class="btn btn-primary">Download Resep</a>
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
