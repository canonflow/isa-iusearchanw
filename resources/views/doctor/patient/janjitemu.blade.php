@extends('doctor.layouts.index');

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class="text-center mt-3">TAMBAH JANJI TEMU</h1>
                    <br>
                    <h5>Ny. Fanny Rorencia Ribowo</h5>
                    <h6>19 thn</h6>
                    <h6>Jl. Raya Kalirungkut, Kali Rungkut, Kec. Rungkut, Surabaya, Jawa Timur 60293</h6>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="inputKeluhan" class="form-label">Keluhan</label>
                            <br>
                            <textarea name="keluhan" id="inputKeluhan" cols="150" rows=10 placeholder="Ketikkan keluhan anda di sini"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="tglTemu" class="form-label">Tanggal Temu</label>
                            <input type="datetime-local" class="form-control" id="tglTemu">
                        </div>
                        <div class="col-12">
                            <label for="dokter">Pilih Dokter</label>
                            <select class="form-select" id="dokter" aria-label="Default select example">
                                <option selected hidden>Open this select menu</option>
                                <option value="nathan">Dr. Nathan Garzya Santoso</option>
                                <option value="amel">Dr. Amelia Griselda</option>
                            </select>
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
