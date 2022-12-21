
@extends('base_layout')

@section("content_breadcumb")
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Planets</span></li>
        </ol>
    </nav>
</div>
@endsection

@section("content_page")
<div class="card">
  <div class="card-header">
    Planets
  </div>
  <div class="card-body table-responsive">
    <table class="table table-striped planets-table">
      <thead>
        <th>No</th>
        <th>Name</th>
        <th>Rotation Periode</th>
        <th>Orbital Periode</th>
        <th>Diameter</th>
        <th>Climate</th>
        <th>Gravity</th>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
@endsection

@section("extrastyle")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
@endsection

@section("extrajs")
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
<script>
$(document).ready(function () {
    $('.planets-table').DataTable({
      ajax: '{{ route("planet-data") }}',
      processing: true,
      serverSide: true,
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'name', name: 'name'},
        {data: 'rotation_period', name: 'rotation_period'},
        {data: 'orbital_period', name: 'orbital_period'},
        {data: 'diameter', name: 'diameter' },
        {data: 'climate', name: 'climate' },
        {data: 'gravity', name: 'gravity' },
      ]
    });
});
</script>
@endsection