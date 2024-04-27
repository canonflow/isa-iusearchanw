@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class="text-center mt-3">INSERT RECIPE</h1>
                    <h3 class="text-center">Dr. Nathan Garzya Santoso</h3>
                    <h5 class="text-center">Physician</h5>
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
                            <label for="inputEmail4" class="form-label">Drug Name : </label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-10">
                            <label for="inputPassword4" class="form-label">Dose :</label>
                            <input type="number" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-2">
                            <label for="inputPassword4" class="form-label">Dose :</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected hidden>Dose Unit</option>
                                <option value="putri">ml</option>
                                <option value="fanny">tablet</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Note : </label>
                            <textarea type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
