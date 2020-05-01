@extends('admin.partials.main')

@section('title', 'Ubah Data Produk')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Data Produk</h5>

              <form class="" method="post" id="formAir"
              action="{{ route('product.update', ['product' => $product->id]) }}">
                @method('patch')
                @csrf
                <div class="position-relative form-group"><label for="nama" class="">Air</label>
                  <!-- <input name="nama" id="nama" placeholder="Jenis Air" type="nama" class="form-control"
                  value="{{ @$product->waters->nama }}"> -->
                  <select class="form-control m-1" name="nama">
                    <option value="{{ @$product->waters->id }}">{{ @$product->waters->nama }}</option>
                    @foreach ($opsiNama as $oa)
                    @if($oa->nama != $product->waters->nama)
                    <option value="{{ $oa->id }}">{{ $oa->nama }}</option>
                    @endif
                    @endforeach
                  </select>
                  @error('nama')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="wadah" class="">Wadah</label>
                  <!-- <input name="ph" id="ph"
                  placeholder="pH Air" type="ph" class="form-control" value="{{ @$air->ph }}"> -->
                  <select class="form-control m-1" name="wadah">
                    <option value="{{ @$product->containers->id }}">{{ @$product->containers->jenis_botol }}</option>
                    @foreach ($opsiWadah as $oa)
                    @if($oa->jenis_botol != $product->containers->jenis_botol)
                    <option value="{{ $oa->id }}">{{ $oa->jenis_botol }}</option>
                    @endif
                    @endforeach
                  </select>
                  @error('wadah')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="isi" class="">Isi (mL)</label>
                  <input name="isi" id="isi" placeholder="Isi Air per Wadah"
                  type="number" class="form-control" value="{{ @$product->isi }}">
                  @error('isi')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="position-relative form-group"><label for="harga" class="">Harga (Rp)</label>
                  <input name="harga" id="harga" placeholder="Isi Air per Wadah"
                  type="number" class="form-control" value="{{ @$product->harga }}">
                  @error('harga')<div style="display:inline;" class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="{{ route('product.show', ['product' => @$product->id]) }}"
                  class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
