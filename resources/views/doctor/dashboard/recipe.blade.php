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
        @php
          $i=1;
        @endphp
        @foreach ($recipe as $r)
            <tr>
              <td>{{$r}}</td>
              <td>{{$r->doctor->name}}</td>
              <td>{{$r->patient->name}}</td>
              <td>{{$r->name}}</td>
              <td>{{$r->dose}}</td>
              <td>{{$r->note}}</td>
              <td>{{$r->unit}}</td>
              <td><button class="btn btn-link">Edit</button>              
              <button type="button" class="btn btn-danger">Hapus</button>
              </td>
              <td>
              <td>
                @if(Count($r->recipe()->get())==0)
                <button type="button" class="btn btn-warning" onclick="openModalBuatRecipe('{{ $r->id }}')">Buat Recipe</button>
                @else
                <a
                    href="{{ route('doctor.recipe.print', ['recipe' => $r->id]) }}"
                    class="btn btn-success"
                    target="_blank"
                >
                    Print Recipe
                </a>
                @endif        
              </td>
            </tr>
            @php($i++)
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
      <!-- Modal Buat Recipe -->
      <div class="modal fade" id="modalBuatRecipe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Buat Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="formModalBuatRecipe" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text fw-semibold" id="addon-wrapping">Grand Total</span>
                            <input type="text" class="form-control" name="grand_total" placeholder="Rp. xxx.xxx" aria-label="Grand Total" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script>
        const modalBuatRecipe = document.getElementById('modalBuatRecipe');
        const formModalBuatRecipe = document.getElementById('formModalBuatRecipe');
        const openModalBuatRecipe = (id) => {
            let action = `{{ route('doctor.dashboard.recipe') }}/${id}/recipe`;
            formModalBuatRecipe.setAttribute('action', action);
            $("#modalBuatRecipe").modal('toggle');
        }

    </script>
@endsection
