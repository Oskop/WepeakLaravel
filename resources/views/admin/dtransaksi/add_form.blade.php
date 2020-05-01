@extends('admin.partials.main')

@section('title', 'Tambah Data Transaksi')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Data Transaksi</h5>

              <form class="" method="post" id="formTransaksi"
              action="{{ route('d_transaction.store') }}">
                @csrf
                <input type="hidden" name="transaksi_id" value="{{ @$id }}">
                <div class="position-relative form-group"><label for="produk" class="">Produk</label>
                  <select class="form-control" name="produk" required>
                    <option value="">Pilih Produk</option>
                    @foreach(@$opsiProduk as $op)
                    <option value="{{ @$op->id }}" @if(@$op->id == old('produk')) selected @endif>{{
                      @$op->waters->nama . '[' . @$op->containers->jenis_botol . ' : ' . @$op->isi  . 'mL]'
                      }}</option>
                    @endforeach
                  </select>
                  @error('produk')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="jumlah" class="">Jumlah</label>
                  <input type="number" name="jumlah" class="form-control"
                  value="{{ old('jumlah') }}" placeholder="Jumlah Produk" required>
                  @error('jumlah')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('d_transaction.index') }}"
                  class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection

@push('scripts')
@endpush
