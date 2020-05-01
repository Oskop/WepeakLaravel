@extends('admin.partials.main')

@section('title', 'Tambah Data Transaksi')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Data Transaksi</h5>

              <form class="" method="post" id="formTransaksi"
              action="{{ route('transaction.store') }}">
                @csrf
                <div class="position-relative form-group"><label for="pelanggan" class="">Pelanggan</label>
                  <input name="pelanggan" id="pelanggan" placeholder="Nama Pelanggan"
                  type="text" class="form-control" value="{{ old('pelanggan') }}" required>
                  @error('pelanggan')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="alamat" class="">Alamat</label>
                  <textarea name="alamat" class="form-control" rows="8" cols="80" required
                  >{{ old('alamat') }}</textarea>
                  </select>
                  @error('alamat')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                  <input name="total" id="total"
                  type="hidden" value="0">
                <div class="position-relative form-group"><label for="lunas" class="">Pelunasan</label>
                  <select class="form-control" name="lunas">
                    <option value="0">Belum</option>
                    <option value="1">Lunas</option>
                  </select>
                  @error('lunas')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('transaction.index') }}"
                  class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
