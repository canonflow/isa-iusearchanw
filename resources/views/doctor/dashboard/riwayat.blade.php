@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            @error ('riwayat')
                <div class="alert alert-danger" role="alert">
                    <span class="fw-bold">{{ $message }}</span>
                </div>
            @enderror
            @error ('service')
                <div class="alert alert-danger" role="alert">
                    <span class="fw-bold">{{ $message }}</span>
                </div>
            @enderror
            <div class="card">
                <div class="card-header bg-light">
                    <a href="{{ route('doctor.index') }}" class="btn btn-warning mt-2 mb-6">Kembali</a>
                    <h1 class="text-center mt-3">Riwayat Pasien {{ $janjiTemu->patient->name }}</h1>
                    <br>
                    <h5>Dr. {{ auth()->user()->doctor->name }}</h5>
                </div>
                <div class="card-body">
                    {{-- {{ route('patient.create-janjitemu') }} --}}
                    <form action="{{route('doctor.riwayat', ['janjiTemu'=>$janjiTemu])}}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="inputKeluhan" class="form-label">Riwayat Pemeriksaan</label>
                            <br>
                            <textarea name="riwayat" id="inputKeluhan" cols="150" rows=10 placeholder="Ketikkan keluhan anda di sini">{{ old('riwayat') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="tglTemu" class="form-label">Service</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="service">
                                <option selected disabled>-- Pilih Jenis Service --</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <input type="submit" value="Tambah" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

<script>
    const fp = flatpickr('#tglTemu', {
    dateFormat: "Y-m-d H:i:S",
    enableTime: true,
    time_24hr: true
});
</script>
@endsection
