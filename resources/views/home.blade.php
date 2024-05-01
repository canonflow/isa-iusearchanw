@extends('layouts.app')

@section('styles')
    <style>
        td {
            font-size: 1.5rem;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center py-2">Selamat Datang di RAWAT JALAN INAP</h1>
            <img class="py-3" src="{{ asset('images/foto_dokter.png') }}" alt="dokter">
            <h2 class="text-center py-5">List Dokter</h2>
            <table class="text-center">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ 'Dr. ' . $doctor->name }}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>


            </table>

        </div>
    </div>
@endsection
