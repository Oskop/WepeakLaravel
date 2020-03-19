@extends('admin.partials.main')

@section('title', 'Jenis Air')

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
            <div class="card-header">Jenis Air
                <div class="btn-actions-pane-right">
                    <a href="{{ route('water.create') }}"
                      class="btn btn-primary">Tambah</a>
                      <select class="custom-select" id="pilihPh" style="width:100px;">
                        <option value="" selected>Pilih ph</option>
                        <option value="11,5">11,5</option>
                        <option value="9,5">9,5</option>
                        <option value="9,0">9,0</option>
                        <option value="8,5">8,5</option>
                        <option value="7,0">7,0</option>
                        <option value="5,5">5,5</option>
                        <option value="2,5">2,5</option>
                      </select>
                </div>
            </div>
            <div class="table-responsive" style="padding:10px;">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">pH Air</th>
                        <th class="text-center">Manfaat</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach( $air as $b => $a)
                    <tr>

                        <td class="text-center text-muted">{{$b+1}}</td>
                        <td class="text-center">{{$a->nama}}</td>
                        <td class="text-center">{{$a->ph}}</td>
                        <td class="text-center" style="width:30em;">{{$a->manfaat}}</td>
                        <td class="text-center">
                          <a href="{{ route('water.show',['water' => $a->id ]) }}"
                            class="btn btn-info">Detail</a>
                          <a href="{{ route('water.edit',['water' => $a->id ]) }}"
                            class="btn btn-warning">Ubah</a>
                          <form action="{{ route('water.destroy', ['water' => $a->id]) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</button>
                          </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
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
  $('#pilihPh').change(function() {
    dd = document.getElementById('pilihPh').value;
    if (dd == '') {
      window.location.href = 'http://localhost:8000/water';
    } else if (dd != '') {
      window.location.href = 'http://localhost:8000/water' + '?ph=' + dd;
    }
  });
</script>
@endsection
