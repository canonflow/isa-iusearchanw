@extends('layouts.app');

@section('content')
    <div class="container-fluid">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class="text-center mt-3">TAMBAH JANJI TEMU</h1>
                    <br>
                    <h5>{{ auth()->user()->patient->name }}</h5>
                    <h6>{{ auth()->user()->patient->address }}</h6>
                </div>
                <div class="card-body">
                    {{-- {{ route('patient.create-janjitemu') }} --}}
                    <form action="" method="POST" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label for="inputKeluhan" class="form-label">Keluhan</label>
                            <br>
                            <textarea name="keluhan" id="inputKeluhan" cols="150" rows=10 placeholder="Ketikkan keluhan anda di sini"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="tglTemu" class="form-label">Tanggal Temu</label>
                            <input type="text" class="form-control" id="tglTemu">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <input type="submit" value="Reserve" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>      
    </div>
@endsection


@section('script')

<script>
    const fp = flatpickr('#tgl_temu', {
    dateFormat: "Y-m-d H:i:S",
    enableTime: true,
    time_24hr: true
});
</script>
@endsection
