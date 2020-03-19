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
                <a href="." class="btn btn-primary pull-right" style="margin-top:4px;">Kembali</a>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
