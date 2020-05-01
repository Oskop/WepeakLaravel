@extends('admin.partials.main')

@section('title', 'Jenis Air')

@section('air_active', 'mm-active')
@section('jenis_air_active', 'mm-active')

@section('container')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Jenis Air Produksi
                <div class="page-title-subheading">Manajemen Data Jenis Air Produksi Mesin Leveluk SD501.
                </div>
            </div>
        </div>
      </div>
</div>
@if (session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
              <div id="filter-form" class="form-inline" role="form">
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="nama" id="nama">
                    <option value="">Jenis Air</option>
                    @foreach($opsiAir as $w)
                    <option value="{{ @$w->nama }}">{{ @$w->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="ph" id="ph">
                    <option value="">pH</option>
                    @foreach($opsiph as $w)
                    <option value="{{ @$w->ph }}">{{ @$w->ph }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- <div class="form-group m-1">
                  <select class="form-control m-1" name="manfaat" id="manfaat"
                   style="width:30%;">
                    <option value="">Manfaat</option>
                    @foreach($opsiManfaat as $w)
                    <option value="{{ @$w->manfaat }}" style="width:30%;"
                      >{{ @$w->manfaat }}</option>
                    @endforeach
                  </select>
                </div> -->
              </div>
              <div class="btn-actions-pane-right">
                  <a href="{{ route('water.create') }}"
                    class="btn btn-primary">Tambah</a>
              </div>
            </div>
            <div class="table-responsive" style="padding:10px;">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover datatable"
                 id="water-table">
                    <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-leftr">Nama</th>
                        <th class="text-left">pH Air</th>
                        <th class="text-center">Manfaat</th>
                        <th class="text-left">Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>


@endsection


@section('customjs')
<script type="text/javascript">
$(document).ready(function () {
  var table = $('.datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '{{ route("water.filter") }}',
        data: function(d) {
          d.nama = $('select[name=nama]').val();
          d.ph = $('select[name=ph]').val();
          // d.manfaat = $('select[name=manfaat]').val();
        },
      },
      columns: [
          {data: 'id', name: 'id'},
          {data: 'nama', name: 'nama'},
          {data: 'ph', name: 'ph'},
          {data: 'manfaat', name: 'manfaat', "width": "50%"},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
  });
  table.draw();
  $('.filter').on('change', function(e) {
    table.destroy();
    $('tbody').remove();
    table = $('#water-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route("water.filter") }}',
          data: function(d) {
            d.nama = $('select[name=nama]').val();
            d.ph = $('select[name=ph]').val();
            // d.manfaat = $('select[name=manfaat]').val();
          },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'ph', name: 'ph'},
            {data: 'manfaat', name: 'manfaat', "width": "50%"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    // table.draw();
    e.preventDefault();
  });
});
</script>
@endsection
