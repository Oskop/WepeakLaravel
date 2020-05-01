@extends('admin.partials.main')

@section('title', 'Detail Produk')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Detail Produk</h5>


                <div class="position-relative form-group">
                  <div class="row">
                    <div class="col-2"><h6>Nama</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$air->nama }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>pH</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$air->ph }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Manfaat</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$air->manfaat }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Isi</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$produk->isi }} mL</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Harga</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">Rp. {{ @$produk->harga }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Wadah</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$wadah->jenis_botol }}</div>
                  </div>
                  <div class="row">
                    <div class="col-2"><h6>Kapasitas</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$wadah->isi }} mL</div>
                  </div>
                  <a href="{{ route('product.edit',['product' => @$produk->id ]) }}"
                    class="btn btn-success" style="margin-top:4px;">Ubah</a>
                  <form action="{{ route('product.destroy', ['product' => @$produk->id]) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')"
                     class="btn btn-danger" style="margin-top:4px;">Hapus</button>
                  </form>
                <a href="{{ route('product.index') }}" class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
