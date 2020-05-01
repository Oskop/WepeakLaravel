@extends('admin.partials.main')

@section('title', 'Detail Wadah')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Detail Wadah</h5>


                <div class="position-relative form-group">
                  <div class="row">
                    <div class="col-3"><h6>Jenis Wadah</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$wadah->jenis_botol }}</div>
                  </div>
                  <div class="row">
                    <div class="col-3"><h6>Isi / Kapasitas</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">{{ @$wadah->isi }} mL</div>
                  </div>
                  <div class="row">
                    <div class="col-3"><h6>Harga</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">Rp {{ @$wadah->harga }}</div>
                  </div>
                  <div class="row">
                    <div class="col-3"><h6>Relasi</h6></div>
                    <div class="col-1"> : </div>
                    <div class="col-6">
                      <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                          <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">ID Air</th>
                                <th class="text-center">ID Wadah</th>
                                <th class="text-center">Isi</th>
                                <th class="text-center">Harga</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($produk as $b => $a)
                            <tr>
                              <td class="text-center">{{$b+1}}</td>
                              <td class="text-center">{{$a->water_id}}</td>
                              <td class="text-center">{{$a->container_id}}</td>
                              <td class="text-center">{{$a->isi}} mL</td>
                              <td class="text-center">Rp. {{$a->harga}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                  <a href="{{ route('container.edit',['container' => @$wadah->id ]) }}"
                    class="btn btn-success" style="margin-top:4px;">Ubah</a>
                  <form action="{{ route('container.destroy', ['container' => @$wadah->id]) }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')"
                     class="btn btn-danger" style="margin-top:4px;">Hapus</button>
                  </form>
                <a href="." class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
