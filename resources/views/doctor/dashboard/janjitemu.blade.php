@extends('doctor.layouts.index')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
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
                        <th scope="col">Resep Obat</th>
                        <th scope="col">Terima | Tolak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Anastasya Putri Mulyani</td>
                        <td>Diare</td>
                        <td>Senin, 22 April 2024</td>
                        <td>Paracetamol<button class="btn btn-link">Edit</button> | <button
                                class="btn btn-link">Tambah</button></td>
                        <td><button type="button" class="btn btn-success text-white">Terima</button> |
                            <button type="button" class="btn btn-danger text-white">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Fanny Rorencia Ribowo</td>
                        <td>Gatal-Gatal</td>
                        <td>Selasa, 23 April 2024</td>
                        <td>Ceritizine<button class="btn btn-link">Edit</button> | <button
                                class="btn btn-link">Tambah</button></td>
                        <td><button type="button" class="btn btn-success text-white">Terima</button> |
                            <button type="button" class="btn btn-danger text-white">Tolak</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Janet Deby Marlien Manoach</td>
                        <td>Asam Lambung Naik</td>
                        <td>Rabu, 24 April 2024</td>
                        <td>Promag<button class="btn btn-link">Edit</button> | <button class="btn btn-link">Tambah</button>
                        </td>
                        <td><button type="button" class="btn btn-success text-white">Terima</button> |
                            <button type="button" class="btn btn-danger text-white">Tolak</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
