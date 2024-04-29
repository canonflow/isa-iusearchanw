@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class="text-center mt-3">INSERT NOTA</h1>
                    <h3 class="text-center">Anton</h3>
                    <h5 class="text-center">Admin</h5>
                </div>
                <div class="card-body">
                    <div class="patient">
                        <label for="">Select Patient :</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected hidden>Open this select menu</option>
                            <option value="putri">Anastasya Putri Mulyani</option>
                            <option value="fanny">Fanny Rorencia Ribowo</option>
                            <option value="deby">Janet Deby Marlien Manoach</option>
                        </select>
                    </div>
                    <br>
                    <form class="row g-3">
                        <div class="col-12">
                            <label for="janji_temu_id">Pilih Janji Temu:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected hidden>Open this select menu</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-10">
                            <label for="price">Grand Total : Rp.</label>
                            <input type="number" class="form-control" id="price" name="price" step="1000" min="1000" max="1000000">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>
                        <br>
                    </form>
                 </div>
            </div>
        </div>
    </div>
@endsection