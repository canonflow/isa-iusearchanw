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
  <div class="container-fluid">
    <div class="container mt-5">
      <h1 class="text-center mt-3">DAFTAR RESEP OBAT</h1>
      <h5 class="text-center">Dr. Nathan</h5>
      <table class="table mt-5">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Resep</th>
            <th scope="col">Jumlah Dosis (gram)</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Edit | Hapus</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td style="text-align: left;">Antangin</td>
            <td>200</td>
            <td>Anton</td>
            <td><button class="btn btn-link">Edit</button>              
            <button type="button" class="btn btn-danger">Hapus</button>
            </td>          
          </tr>
          <tr>
            <th scope="row">2</th>
            <td style="text-align: left;">Panadol</td>
            <td>500</td>
            <td>Putri</td>
            <td><button class="btn btn-link">Edit</button>              
            <button type="button" class="btn btn-danger">Hapus</button>
            </td>          
          </tr>
          <tr>
            <th scope="row">3</th>
            <td style="text-align: left;">Paracetamol</td>
            <!-- <td colspan="2">Pegel Linu</td> -->
            <td>250</td>
            <td>Fanny</td>
            <td><button class="btn btn-link">Edit</button>              
            <button type="button" class="btn btn-danger">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
