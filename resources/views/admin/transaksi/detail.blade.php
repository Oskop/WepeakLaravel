@extends('admin.partials.main')

@section('title', 'Detail Produk')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col">
      <div class="main-card mb-3 card">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif
          <div class="card-body"><h5 class="card-title">Detail Produk</h5>


                <div class="position-relative form-group">
                  <div class="row">
                    <div class="col-2"><h6>Pelanggan</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$transaction[0]->pelanggan }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Alamat</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$transaction[0]->alamat }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Total</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">Rp {{ @$transaction[0]->total }}</div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-2"><h6>Pelunasan</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$transaction[0]->displayable_lunas }}</div>
                  </div>
                  <a href="{{ route('transaction.edit',['transaction' => @$transaction[0]->id ]) }}"
                    class="btn btn-success" style="margin-top:4px;">Ubah</a>
                  <form action="{{ route('transaction.destroy', ['transaction' => @$transaction[0]->id]) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')"
                     class="btn btn-danger" style="margin-top:4px;">Hapus</button>
                  </form>
                  <div class="row mb-2 mt-2">
                    <div class="col-3">
                      <h5>Daftar Produk</h5>
                    </div>
                    <div class="col-9">
                      <form action="{{ route('d_transaction.create') }}" method="get" class="d-inline">
                        @csrf
                        <input type="hidden" name="transaction_id" value="{{ @$transaction[0]->id }}">
                        <button type="submit"
                         class="btn btn-primary pull-right">Tambah</button>
                      </form>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div id="filter-form" class="form-inline" role="form">
                      <input type="hidden" name="transaction_id" value="{{ @$transaction[0]->id }}">
                      <div class="form-group m-1">
                        <select class="form-control m-1 filter" name="nama">
                          <option value="">Air</option>
                          @foreach (@$transaction[0]->d_transactions as $a)
                          <option value="{{ $a->products->water_id }}">{{ $a->products->waters->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group m-1">
                        <select class="form-control m-1 filter" name="wadah">
                          <option value="">Wadah</option>
                          @foreach (@$transaction[0]->d_transactions as $a)
                          <option value="{{ $a->products->container_id }}">{{ $a->products->containers->jenis_botol }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group m-1">
                        <select class="form-control m-1 filter" name="isi">
                          <option value="">Volume Air</option>
                          @foreach (@$transaction[0]->d_transactions as $a)
                          <option value="{{ $a->products->isi }}">{{ $a->products->isi }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col">
                      <table class="align-middle mb-0 table table-borderless table-striped table-hover"
                       id="datatable">
                          <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Produk Air</th>
                                <th class="text-center">Wadah</th>
                                <th class="text-center">Isi</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal (Rp)</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                          </thead>
                          {{-- <tbody>
                            @foreach (@$transaction[0]->d_transactions as $a)
                            <tr>
                              <td class="text-center">{{$loop->index + 1}}</td>
                              <td class="text-center">{{$a->products->waters->nama}}</td>
                              <td class="text-center">{{$a->products->containers->jenis_botol}}</td>
                              <td class="text-center">{{$a->products->isi}} mL</td>
                              <td class="text-center">{{$a->jumlah}}</td>
                              <td class="text-center">Rp. {{$a->subtotal}}</td>
                              <td class="text-center">
                                <!-- <a href="{{ route('d_transaction.show', ['d_transaction' => $a->id]) }}"
                                  class="btn btn-xs btn-primary mr-1">Detail</a> -->
                                <a href="{{ route('d_transaction.edit',['d_transaction' => $a->id ]) }}"
                                  class="btn btn-xs btn-success mr-1">Ubah</a>
                                <form action="{{ route('d_transaction.destroy', ['d_transaction' => $a->id]) }}" method="post" class="d-inline">
                                  @method('delete')
                                  @csrf
                                  <input type="hidden" name="transaksi_id" value="{{ @$transaction[0]->id }}">
                                  <input type="hidden" name="item_id" value="{{ $a->id }}">
                                  <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody> --}}
                        </table>
                    </div>
                  </div>

                <a href="{{ route('transaction.index') }}" class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
          </div>
      </div>
  </div>
</div>
</div>
@endsection

@section('customjs')
<script type="text/javascript">
  $(document).ready(function () {
    console.log('Halo');
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: '{{ route("d_transaction.filter") }}',
          data: function(d) {
            d.nama = $('select[name=nama]').val();
            d.transaction_id = $('input[name=transaction_id]').val();
            d.wadah = $('select[name=wadah]').val();
            d.isi = $('select[name=isi]').val();
          },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'products.waters.nama', name: 'products.waters.nama'},
            {data: 'products.containers.jenis_botol', name: 'products.containers.jenis_botol'
            // , "width": "35%"
            },
            {data: 'products.isi', name: 'products.isi'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'subtotal', name: 'subtotal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    table.draw();
    $('.filter').on('change', function(e) {
      table.destroy();
      $('tbody').remove();
      table = $('#datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: '{{ route("d_transaction.filter") }}',
            data: function(d) {
              d.nama = $('select[name=nama]').val();
              d.transaction_id = $('input[name=transaction_id]').val();
              d.wadah = $('select[name=wadah]').val();
              d.isi = $('select[name=isi]').val();
            },
          },
          columns: [
            {data: 'id', name: 'id'},
            {data: 'products.waters.nama', name: 'products.waters.nama'},
            {data: 'products.containers.jenis_botol', name: 'products.containers.jenis_botol'
            // , "width": "35%"
            },
            {data: 'products.isi', name: 'products.isi'},
            {data: 'jumlah', name: 'jumlah'},
            {data: 'subtotal', name: 'subtotal'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ],
      });
      table.draw();
      e.preventDefault();
    });
  });
</script>
@endsection
