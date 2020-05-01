<!-- Non Datatable -->
<div class="table-responsive" style="padding:10px;">
    <table class="align-middle mb-0 table table-borderless table-striped table-hover datatable">
        <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Jenis Wadah</th>
            <th class="text-center">Isi</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach( $wadah as $b => $a)
        <tr>

            <td class="text-center text-muted">{{$b+1}}</td>
            <td class="text-center">{{$a->jenis_botol}}</td>
            <td class="text-center">{{$a->isi}} mL</td>
            <td class="text-center">Rp {{$a->harga}}</td>
            <td class="text-center">
              <a href="{{ route('container.show',['container' => $a->id ]) }}"
                class="btn btn-info">Detail</a>
              <a href="{{ route('container.edit',['container' => $a->id ]) }}"
                class="btn btn-warning">Ubah</a>
              <form action="{{ route('container.destroy', ['container' => $a->id]) }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" onclick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</button>
              </form>
            </td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!-- Non Datatable -->

<div class="card-body">
  <form method="POST" id="search-form" class="form-inline" role="form">
    @csrf
    <div class="form-group m-1">
        <label for="jenis_botol">Name</label>
        <input type="text" class="form-control m-1" name="jenis_botol" id="jenis_botol" placeholder="Jenis Botol">
    </div>
    <div class="form-group m-1">
        <label for="isi">Isi</label>
        <input type="number" class="form-control m-1" name="isi" id="isi" placeholder="mili Liter">
    </div>
    <div class="form-group m-1">
        <label for="harga">Harga</label>
        <input type="number" class="form-control m-1" name="harga" id="harga" placeholder="Rupiah">
    </div>
    <button type="submit" class="m-1 btn btn-primary">Search</button>
  </form>
</div>


<!-- <script type="text/javascript">
  oTable = $('#containersdatatable-table').DataTable({
    dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
            "<'row'<'col-xs-12't>>"+
            "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    ajax: {
        url: 'containercustomfilter',
        data: function (d) {
            d.jenis_botol = $('input[name=jenis_botol]').val();
            d.isi = $('input[name=isi]').val();
            d.harga = $('input[name=harga]').val();
        }
    },
    columns: [
            {data: 'id', name: 'id'},
            {data: 'jenis_botol', name: 'Wadah'},
            {data: 'isi', name: 'isi'},
            {data: 'harga', name: 'harga'},
            // {data: 'updated_at', name: 'updated_at'}
        ]
  });
  $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
</script> -->
