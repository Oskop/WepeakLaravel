@extends('admin.partials.main')

@section('title', 'Transaksi WEPEAK')

@section('container')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Transaksi WEPEAK
                <div class="page-title-subheading">Manajemen Data Transaksi WEPEAK.
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
            <div class="card-header m-2" style="height: auto !important;">
              <!-- Transaksi -->

              <div id="filter-form" class="form-inline" role="form">
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="pelanggan">
                    <option value="">Pelanggan</option>
                    @foreach ($opsiPelanggan as $oa)
                    <option value="{{ $oa->pelanggan }}">{{ $oa->pelanggan }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="lunas">
                    <option value="">Pelunasan</option>
                    <option value="1">Lunas</option>
                    <option value="0">Belum</option>
                  </select>
                </div>
              </div>
              <div class="btn-actions-pane-right">
                <div class="col-1">
                  <a href="{{ route('transaction.create') }}"
                  class="btn btn-primary" style="height:36px;">Tambah</a>
                </div>
              </div>

            </div>
            <div class="card-body">
              <div class="table-responsive" style="padding:10px;">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover mb-2 datatable"
                  id="produk-table">
                  <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th class="text-left">Pelanggan</th>
                        <th class="text-left">Alamat</th>
                        <th class="text-left">Total Biaya (Rp)</th>
                        <th class="text-left">Lunas</th>
                        <th class="text-left">Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('customjs')

<script type="text/javascript">
$(document).ready(function () {
  var table = $('.datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '{{ route("transaction.filter") }}',
        data: function(d) {
          d.pelanggan = $('select[name=pelanggan]').val();
          d.lunas = $('select[name=lunas]').val();
          d.total = $('select[name=harga]').val();
        },
      },
      columns: [
          {data: 'id', name: 'id'},
          {data: 'pelanggan', name: 'pelanggan'},
          {data: 'alamat', name: 'alamat', "width": "35%"},
          {data: 'total', name: 'total'},
          {data: 'displayable_lunas', name: 'displayable_lunas'},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ],
  });
  table.draw();
  $('.filter').on('change', function(e) {
    table.destroy();
    $('tbody').remove();
    table = $('#produk-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route("transaction.filter") }}',
          data: function(d) {
            d.pelanggan = $('select[name=pelanggan]').val();
            d.lunas = $('select[name=lunas]').val();
            d.total = $('select[name=harga]').val();
          },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'pelanggan', name: 'pelanggan'},
            {data: 'alamat', name: 'alamat', "width": "35%"},
            {data: 'total', name: 'total'},
            {data: 'displayable_lunas', name: 'displayable_lunas'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    table.draw();
    e.preventDefault();
  });
});
</script>
@endsection
