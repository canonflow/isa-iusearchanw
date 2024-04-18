@extends('admin.layouts.index')

@section('styles')
    <style>
        #content1 {
            padding: 1px 30px;
        }

        .table-responsive{
            flex-direction: column;
            align-items: center;
            border: 5px solid black;
            border-radius: 7px;
            padding: 10px 10px;
            margin: 25px 25px;
            background-color: white;
        }
        
        h1 {
            margin: 25px 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-weight: bold;
        }

        th, td{
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="form">
        <h1>List Patient</h1>

        <div class="container mt-3">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Pencarian" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>
        <!-- <div id="content1">
            <form action="post">
                <label for="inputSearch"><b>Pencarian : </b></label>
                <input type="text" name="inputSearch" id="inputSearch">
            </form>
        </div> -->

        <div class="table-responsive">
            <table class="table">
                <table class="table caption-top">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Anastasya Putri</td>
                        <td>24/09/2004</td>
                        <td>Waru, Sidoarjo, Jawa Timur</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-primary">Hapus</button>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Jacob Rijohnson</td>
                        <td>28/05/1998</td>
                        <td>Tenggilis, Surabaya, Jawa Timur</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-primary">Hapus</button>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry Deburgh</td>
                        <td>05/12/1994</td>
                        <td>Merjosari, Malang, Jawa Timur</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-primary">Hapus</button>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </table>
        </div>
    </div>
@endsection