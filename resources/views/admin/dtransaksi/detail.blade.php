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
                      <a href="{{ route('d_transaction.create') }}" class="btn btn-primary pull-right">Tambah Item</a>
                    </div>
                  </div>

                  <div class="row mb-2">
                    <div class="col">
                      <table class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                          <tbody>
                            @foreach (@$transaction[0]->d_transactions as $a)
                            <tr>
                              <td class="text-center">{{$loop->index + 1}}</td>
                              <td class="text-center">{{$a->products->waters->nama}}</td>
                              <td class="text-center">{{$a->products->containers->jenis_botol}}</td>
                              <td class="text-center">{{$a->jumlah}} mL</td>
                              <td class="text-center">{{$a->jumlah}}</td>
                              <td class="text-center">Rp. {{$a->subtotal}}</td>
                              <td class="text-center">
                                <a href="{{ route('d_transaction.show', ['d_transaction' => $a->id]) }}"
                                  class="btn btn-xs btn-primary mr-1">Detail</a>
                                <a href="{{ route('d_transaction.edit',['d_transaction' => $a->id ]) }}"
                                  class="btn btn-xs btn-success mr-1">Ubah</a>
                                <form action="{{ route('d_transaction.destroy', ['d_transaction' => $a->id]) }}" method="post" class="d-inline">
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

                <a href="{{ route('transaction.index') }}" class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
          </div>
      </div>
  </div>
</div>
</div>
@endsection

@push('scripts')

@endpush
