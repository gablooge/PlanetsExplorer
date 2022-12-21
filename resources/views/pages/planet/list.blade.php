
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
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Rotation Periode</th>
          <th>Orbital Periode</th>
          <th>Diameter</th>
          <th>Climate</th>
          <th>Gravity</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>
@endsection

@section("extrastyle")
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css"/>
@endsection

@section("extrajs")
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
<script>
$(document).ready(function () {
    $('.planets-table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('.planets-table thead');
    $('.planets-table').DataTable({
      ajax: '{{ route("planet-data") }}',
      orderCellsTop: true,
      initComplete: function () {
        var api = this.api();
        // For each column
        api
            .columns()
            .eq(0)
            .each(function (colIdx) {
                var cell = $('.filters th').eq(
                    $(api.column(colIdx).header()).index()
                );
                if(colIdx > 1){
                  // Set the header cell to contain the input element
                  var title = $(cell).text();
                  $(cell).html('<input type="text" placeholder="' + title + '" />');
  
                  // On every keypress in this input
                  $('input',
                    $('.filters th').eq($(api.column(colIdx).header()).index())).off('keyup change').on('change', function (e) {
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
  
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api
                            .column(colIdx)
                            .search(
                                this.value != ''
                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                    : '',
                                this.value != '',
                                this.value == ''
                            )
                            .draw();
                    }).on('keyup', function (e) {
                        e.stopPropagation();
                        $(this).trigger('change');
                        $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                    });
                } else {
                  $(cell).html('');
                }
            });
      },
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