@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container mt-3">
            <div class="card">
                <div class="card-header bg-light pt-3">
                    <h1 class="text-center">LIST JANJI TEMU</h1>
                    <br>
                    <h5>Ny. Fanny Rorencia Ribowo</h5>
                    <h6>19 thn</h6>
                    <h6>Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur 60293</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Dokter</th>
                                <th scope="col">Tanggal Temu</th>
                                <th scope="col">Keluhan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Recipes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;

                            @endphp
                            @foreach ($janjiTemu as $jt)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ ($jt->doctor_id) ? $jt->doctor->name : '-' }}</td>
                                    <td>{{ $jt->tgl_temu }}</td>
                                    <td>{{ $jt->keluhan }}</td>
                                    <td>
                                        @if($jt->status=='Menunggu')
                                        <span class="badge bg-warning text-dark">{{$jt->status}}</span>
                                        @else
                                        <span class="badge bg-success">{{$jt->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($jt->recipe_id!=null)
                                        <a href=""class="btn btn-primary">Lihat resep doktor</a>
                                        @endif
                                    </td>
                                </tr>
                                @php($i++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
