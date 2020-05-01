@extends('admin.partials.main')

@section('title', 'Wadah')

@section('container')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Wadah
                <div class="page-title-subheading">Manajemen Data Wadah Air.
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
                  <select class="form-control m-1 filter" name="jenis_botol" id="jenis_botol">
                    <option value="">Jenis Wadah</option>
                    @foreach($opsiWadah as $w)
                    <option value="{{ @$w->jenis_botol }}"
                      >{{ @$w->jenis_botol }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="isi" id="isi">
                    <option value="">Isi</option>
                    @foreach($opsiIsi as $w)
                    <option value="{{ @$w->isi }}">{{ @$w->isi }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group m-1">
                  <select class="form-control m-1 filter" name="harga" id="harga">
                    <option value="">Harga Wadah</option>
                    @foreach($opsiHarga as $w)
                    <option value="{{ @$w->harga }}">{{ @$w->harga }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                <div class="btn-actions-pane-right">
                    <a href="{{route('container.create')}}"
                      class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="padding:10px;">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover datatable"
                id="tableData">
                  <thead>
                    <tr>
                      <th class="text-left">#</th>
                      <th class="text-left">Jenis Wadah</th>
                      <th class="text-left">Isi (mL)</th>
                      <th class="text-left">Harga (Rp)</th>
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
          url: '{{ route("container.filter") }}',
          data: function(d) {
            d.jenis_botol = $('select[name=jenis_botol]').val();
            d.isi = $('select[name=isi]').val();
            d.harga = $('select[name=harga]').val();
          },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'jenis_botol', name: 'jenis_botol'},
            {data: 'isi', name: 'isi'},
            {data: 'harga', name: 'harga'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    table.draw();
    $('.filter').on('change', function(e) {
      table.destroy();
      $('tbody').remove();
      table = $('#tableData').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: '{{ route("container.filter") }}',
            data: function(d) {
              d.jenis_botol = $('select[name=jenis_botol]').val();
              d.isi = $('select[name=isi]').val();
              d.harga = $('select[name=harga]').val();
            },
          },
          columns: [
              {data: 'id', name: 'id'},
              {data: 'jenis_botol', name: 'jenis_botol'},
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
