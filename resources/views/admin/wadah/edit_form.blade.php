@extends('admin.partials.main')

@section('title', 'Ubah Wadah')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Wadah</h5>

              <form class="" method="post" id="formAir"
              action="{{ route('container.update', ['container' => $container->id]) }}">
                @method('patch')
                @csrf
                <div class="position-relative form-group"><label for="jenis_botol" class="">Jenis Wadah</label>
                  <input name="jenis_botol" id="jenis_botol" placeholder="Nama Wadah" type="jenis_botol" class="form-control"
                  value="{{ @$container->jenis_botol }}">
                  @error('jenis_botol')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="isi" class="">Isi (mL)</label><input name="isi" id="isi"
                  placeholder="pH Air" type="number" class="form-control" value="{{ @$container->isi }}">
                  @error('isi')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="harga" class="">Harga (Rp)</label>
                  <input name="harga" id="harga"
                    placeholder="Rupiah" type="number" class="form-control" value="{{ @$container->harga }}">
                  @error('harga')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="." class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
