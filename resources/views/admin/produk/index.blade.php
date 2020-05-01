@extends('admin.partials.main')

@section('title', 'Produk WEPEAK')

@section('container')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Produk WEPEAK
                <div class="page-title-subheading">Manajemen Data Produk WEPEAK.
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
              <!-- Produk -->
              <!-- <h5 class="ml-1 pt-1" style="font-weight:bold;">Filter</h5> -->
              <div id="filter-form" class="form-inline" role="form">
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="nama">
                    <option value="">Air</option>
                    @foreach ($opsiNama as $oa)
                    <option value="{{ $oa->nama }}">{{ $oa->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="wadah">
                    <option value="">Wadah</option>
                    @foreach ($opsiWadah as $oa)
                    <option value="{{ $oa->jenis_botol }}">{{ $oa->jenis_botol }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="isi">
                    <option value="">Isi</option>
                    @foreach ($opsiIsi as $oa)
                    <option value="{{ $oa->isi }}">{{ $oa->isi }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="harga">
                    <option value="">Harga</option>
                    @foreach ($opsiHarga as $oa)
                    <option value="{{ $oa->harga }}">{{ $oa->harga }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="btn-actions-pane-right">
                <div class="col-1">
                  <a href="{{ route('product.create') }}"
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
                        <th class="text-left">Air</th>
                        <th class="text-left">Wadah</th>
                        <th class="text-left">Isi</th>
                        <th class="text-left">Harga</th>
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
        url: '{{ route("product.filter") }}',
        data: function(d) {
          d.jenis_botol = $('select[name=wadah]').val();
          d.nama = $('select[name=nama]').val();
          d.isi = $('select[name=isi]').val();
          d.harga = $('select[name=harga]').val();
        },
      },
      columns: [
          {data: 'id', name: 'id'},
          {data: 'nama', name: 'waters.nama'},
          {data: 'containers.jenis_botol', name: 'containers.jenis_botol'},
          {data: 'isi', name: 'isi'},
          {data: 'harga', name: 'harga'},
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
          url: '{{ route("product.filter") }}',
          data: function(d) {
            d.wadah = $('select[name=wadah]').val();
            d.nama = $('select[name=nama]').val();
            d.isi = $('select[name=isi]').val();
            d.harga = $('select[name=harga]').val();
          },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nama', name: 'waters.nama'},
            {data: 'containers.jenis_botol', name: 'containers.jenis_botol'},
            {data: 'isi', name: 'isi'},
            {data: 'harga', name: 'harga'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    table.draw();
    e.preventDefault();
  });
});
</script>
@endsection
