@extends('layouts.app')

@section('styles')
    <style>
    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: center;
    }
    </style>
@endsection

@section('content')
  <!-- <head>
    <title>Jadwal Praktik Anda</title>
  </head> -->
  <div class="container-fluid">
    <div class="container mt-5">
      <h1 class="text-center mt-3">DAFTAR JADWAL PRAKTIK</h1>
      <h5 class="text-center">Dr. Nathan</h5>
      <h5 class="text-center">Spesialis : Penyakit Sakit Hati</h5>
      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Tanggal Praktik</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Jam Selesai</th>
            <th scope="col">Edit</th>
            <th scope="col" colspan="2">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Sabtu, 20 April 2024</td>
            <td>12:00:03</td>
            <td>19:00:00</td>
            <td><button class="btn btn-link">Edit</button></td>
            <td>
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
              </button>
            </td>
            <td><button type="button" class="btn btn-danger">Batal</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </td>
          </tr>
          <tr>
          <th scope="row">2</th>
            <td>Minggu, 21 April 2024</td>
            <td>12:00:03</td>
            <td>20:00:00</td>
            <td><button class="btn btn-link">Edit</button></td>
            <td>
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
              </button>
            </td>
            <td><button type="button" class="btn btn-danger">Batal</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </td>                      
          </tr>
          <tr>
          <th scope="row">1</th>
            <td>Sabtu, 20 April 2024</td>
            <td>14:00:03</td>
            <td>20:00:00</td>
            <td><button class="btn btn-link">Edit</button></td>
            <td>
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
              </button>
            </td>
            <td><button type="button" class="btn btn-danger">Batal</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </td>                      
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection