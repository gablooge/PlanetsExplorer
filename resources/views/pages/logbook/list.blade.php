
@extends('base_layout')

@section("content_breadcumb")
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Logbooks</span></li>
        </ol>
    </nav>
</div>
@endsection

@section("content_page")
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-12">
        <div class="float-start">
          Logbooks
        </div>  
        <div class="float-end">
          <!-- <a class="btn btn-success" href="{{ route('logbook_create') }}">
            ADD
          </a> -->
        </div> 
      </div>
    </div>
  </div>
  <div class="card-body table-responsive">
    <table class="table table-striped logbook-table">
      <thead>
        <th>No</th>
        <th>Name</th>
        <th>Note</th>
        <th>Mood</th>
        <th>Weather</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Author</th>
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
    $('.logbook-table').DataTable({
      ajax: '{{ route("logbook_datatable") }}',
      processing: true,
      serverSide: true,
      columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'name', name: 'name'},
        {data: 'note', name: 'note'},
        {data: 'mood', name: 'mood'},
        {data: 'weather', name: 'weather' },
        {data: 'lat', name: 'lat' },
        {data: 'long', name: 'long' },
        {data: 'people_name', name: 'people_name' },
      ]
    });
});
</script>
@endsection