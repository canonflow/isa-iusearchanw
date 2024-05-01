@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container mt-3">
            <div class="card">
                <div class="card-header bg-light pt-3">
                    <h1 class="text-center">LIST JANJI TEMU</h1>
                    <br>
                    <h5>{{ auth()->user()->patient->name }}</h5>
                    <h6>{{ ((new DateTime(auth()->user()->patient->birth_date))->diff(new DateTime()))->y }} Tahun</h6>
{{--                    <h6>Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur 60293</h6>--}}
                    <h6>{{ auth()->user()->patient->address }}</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('patient.janjitemu') }}" class="btn btn-primary mb-3">Tambah Janji Temu</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="20%">Nama Dokter</th>
                                <th scope="col" width="20%">Tanggal Temu</th>
                                <th scope="col" width="20%">Keluhan</th>
                                <th scope="col" width="5%">Status</th>
                                <th scope="col" width="20%">Riwayat Pemeriksaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;

                            @endphp
                            @foreach ($janjiTemu as $jt)
                                <tr>
                                    <td width="5%">{{ $i }}</td>
                                    <td width="20%">{{ ($jt->doctor_id) ? $jt->doctor->name : '-' }}</td>
                                    <td width="20%">{{ $jt->tgl_temu }}</td>
                                    <td width="20%">{{ $jt->keluhan }}</td>
                                    <td width="5%">
                                        @if($jt->status=='Menunggu')
                                        <span class="badge bg-warning text-dark">{{$jt->status}}</span>
                                        @else
                                        <span class="badge bg-success">{{$jt->status}}</span>
                                        @endif
                                    </td>
                                    <td width="20%">
                                        @if($jt->service_id!=null)
                                        <a target="_blank" href="{{ route('patient.janjitemu.print', ['janjiTemu' => $jt->id]) }}"class="btn btn-primary">Lihat Riwayat Pemeriksaan</a>
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
