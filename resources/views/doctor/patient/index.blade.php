@extends('doctor.layouts.index')

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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Dr. Nathan Garzya Santoso</td>
                                <td>24/04/2024 19:00</td>
                                <td>Muntah dan Berak</td>
                                <td>
                                    <div class="bg-danger text-white rounded-4" style="padding-left: 1rem;">DITOLAK</div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Dr. Amelia Griselda</td>
                                <td>26/04/2024 18:00</td>
                                <td>Muntah dan Berak</td>
                                <td>
                                    <div class="bg-success text-white rounded-4" style="padding-left: 1rem;">DITERIMA</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
