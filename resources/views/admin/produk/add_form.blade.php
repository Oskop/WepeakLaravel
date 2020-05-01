@extends('admin.partials.main')

@section('title', 'Tambah Data Produk')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Data Produk</h5>

              <form class="" method="post" id="formAir"
              action="{{ route('product.store') }}">
                @csrf
                <div class="position-relative form-group"><label for="nama" class="">Air</label>
                  <select class="form-control m-1" name="nama">
                    <option value="">Pilih Air</option>
                    @foreach ($opsiNama as $oa)
                    <option value="{{ $oa->id }}"
                      @if(old('nama') == $oa->id) selected @endif >{{ $oa->nama }}</option>
                    @endforeach
                  </select>
                  @error('nama')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="wadah" class="">Wadah</label>
                  <select class="form-control m-1" name="wadah">
                    <option value="">Pilih Wadah</option>
                    @foreach ($opsiWadah as $oa)
                    <option value="{{ $oa->id }}"
                      @if(old('wadah') == $oa->id) selected @endif >{{ $oa->jenis_botol }}</option>
                    @endforeach
                  </select>
                  @error('wadah')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="isi" class="">Isi (mL)</label>
                  <input name="isi" id="isi" placeholder="Isi Air per Wadah"
                  type="number" class="form-control" value="{{ old('isi') }}">
                  @error('isi')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="harga" class="">Harga (Rp)</label>
                  <input name="harga" id="harga" placeholder="Harga per Satuan"
                  type="number" class="form-control" value="{{ old('harga') }}">
                  @error('harga')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('product.index') }}"
                  class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
