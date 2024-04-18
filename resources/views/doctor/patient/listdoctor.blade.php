@extends('doctor.patient.index')

@section('styles')
    <style>
        .card {
            display: flex;
            flex-direction: column;
            align-items: left;
            border: 5px solid black;
            border-radius: 7px;
            padding: 10px 30px;
            margin: 25px 25px;
            background-color: white;
        }

        h5{
            font-weight: bold;
        }

    </style>
@endsection

@section('content')
    <div class="form">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                <img src="{{asset('images/doctor3.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Amelia Griselda</h5>
                    <p class="card-text">Dokter Umum <br>20 years experience</p>
                    <p class="card-text"> <small class="text-body-secondary">Surabaya, Jawa Timur</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="button">Buat Janji</button>
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="{{asset('images/doctor2.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nathan Garzya Santoso</h5>
                    <p class="card-text">Dokter Gigi <br>27 years experience</p>
                    <p class="card-text"> <small class="text-body-secondary">Surabaya, Jawa Timur</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary" type="button">Buat Janji</button>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
