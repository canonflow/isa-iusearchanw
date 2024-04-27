@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center">Selamat Datang di RAWAT JALAN INAP</h1>
        <img src="{{asset('images/foto_dokter.png')}}" alt="harusnya sih foto gengs kita yah">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
