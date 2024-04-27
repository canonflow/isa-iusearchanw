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
            <h3 class="text-center">Dr. Nathan Garzya Santoso</h3>
            <h5 class="text-center">Dokter Umum</h5>
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
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
                    @foreach($janjiTemu as $jt)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$jt->patient->name}}</td>
                        <td>{{$jt->keluhan}}</td>
                        <td>{{$jt->tgl_temu}}</td>
                        <td>
                            @if($jt->service_id == null)
                            <form action="{{route("doctor.riwayat",["janjiTemu"=>$jt->id])}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-success">Riwayat pasien</button>
                            </form>
                            @else
                            <a class="btn btn-warning">Download Riwayat</a>
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
