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
            <h1 class="text-center">PILIH JANJI TEMU PASIEN</h1>
                <h3 class="text-center">Dr. {{ auth()->user()->doctor->name }}</h3>
            <h5 class="text-center">Dokter Umum</h5>
            <a href="{{ route('doctor.index') }}" class="btn btn-primary">Kembali</a>
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
                    @foreach($janjitemu as $jt)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$jt->patient->name}}</td>
                        <td>{{$jt->keluhan}}</td>
                        <td>{{$jt->tgl_temu}}</td>
                        <td>
                            <form action="{{route("doctor.terima-janjiTemu",["janjiTemu"=>$jt->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Terima pasien</button>
                            </form>
                        </td>
                    </tr>
                    @php($i++)
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
