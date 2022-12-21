
@extends('base_layout')

@section("content_breadcumb")
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <span>Home</span>
            </li>
            <li class="breadcrumb-item">
                <span>Logbooks</span>
            </li>
            <li class="breadcrumb-item active"><span>Create</span></li>
        </ol>
    </nav>
</div>
@endsection

@section("content_page")
<div class="card">
  <div class="card-header">
    Form Add Logbook
  </div>
  <div class="card-body table-responsive">
    <form action="" method="post">
      <div class="row">
        <div class="col-12 mt-2">
          <label for="">Name</label>
          <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="col-12">
          <label for="">Note</label>
          <textarea name="note" id="note_id" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="col-12 mt-2">
          <label for="">Latitude</label>
          <input type="text" class="form-control" placeholder="Latitude" name="lat">
        </div>
        <div class="col-12 mt-2">
          <label for="">Longitude</label>
          <input type="text" class="form-control" placeholder="Longitude" name="long">
        </div>
        <div class="col-12 mt-2">
          <button class="btn btn-bloc btn-success float-start">Save</button>
          <a class="btn btn-bloc btn-danger float-end" href="{{ route('logbook_list') }}">Back</a>
        </div>
      </div>
    </form>
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