@extends('admin.layouts.index')

@section('styles')
    <style>
        .card {
            display: flex;
            flex-direction: column;
            align-items: left;
            /*border: 5px solid black;*/
            /*border-radius: 7px;*/
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
    <div class="form px-5">
            @foreach($doctors as $doctor)
                <div class="card">
                    <img src="{{asset('images/doctor3.jpg')}}" width="25%" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$doctor->name}}</h5>
                        <p class="card-text">Dokter Umum <br>20 years experience</p>
                        <p class="card-text"> <small class="text-body-secondary">Surabaya, Jawa Timur</small></p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="button">Buat Janji</button>
                        </div>
                    </div>
                </div>
                    <hr>

            @endforeach
    </div>
@endsection
