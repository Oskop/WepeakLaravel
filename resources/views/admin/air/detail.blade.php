@extends('admin.partials.main')

@section('title', 'Detail Jenis Air')

@section('container')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
<div class="row">
  <div class="col-md-9">
      <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Detail Jenis Air</h5>


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
                    <div class="col-2"><h6>Relasi</h6></div>
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
                <a href="{{ route('water.index') }}" class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
