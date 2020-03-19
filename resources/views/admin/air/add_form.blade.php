@extends('admin.partials.main')

@section('title', 'Tambah Jenis Air')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Jenis Air</h5>

              <form class="" method="post" id="formAir" action="{{route('water.store')}}">
                @csrf
                <div class="position-relative form-group"><label for="nama" class="">Nama</label>
                  <input name="nama" id="nama" placeholder="Nama Jenis Air" type="nama" class="form-control"
                  value="{{ old('nama') }}">
                  @error('nama')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="ph" class="">pH</label><input name="ph" id="ph"
                  placeholder="pH Air" type="ph" class="form-control" value="{{ old('ph') }}">
                  @error('ph')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="manfaat" class="">Manfaat</label>
                  <textarea name="manfaat" id="manfaat" class="form-control"
                  >{{ old('manfaat') }}</textarea>
                  @error('manfaat')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="mt-1 btn btn-primary">Simpan</button>
                <a href="." class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
