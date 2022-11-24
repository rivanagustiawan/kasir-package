<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Kasir</title>
  </head>
  <body>
    <div class="container py-4 px-4 mt-5">
            <form class="form-inline">
                <div class="form-group mb-2">
                <label for="formGroupExampleInput">Barang : </label>
                <select name="pesanan" id="pesanan" class="form-control py-2">
                    @foreach ($data_barang as $barang)
                    <option value="{{ $barang['id'] }}">{{ $barang['nama_barang'] }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                <label for="formGroupExampleInput">Quantity : </label>
                <input type="number" class="form-control" id="quantity" name="quantity" oninvalid="setCustomValidity('Melebihi Stok !')">
                </div>
                <button type="button" class="btn btn-primary mb-2" id="tambah">Tambah</button>
            </form>

            <h2>Pesanan</h2>
        <form action="{{ route('pesan') }}" method="post">
            @csrf
          <table class="table table-striped" id="table_pesanan">
            <thead>
              <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody id='listPesanan'>
            </tbody>
          </table>
          <button type="submit" class="btn btn-primary mb-2" id="pesan" disabled>PESAN SEKARANG</button>
        </form>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $('#tambah').click(function(){
            var id = $('#pesanan').val();
            var qty = $('#quantity').val();
            $_token = "{{ csrf_token() }}";
            $.ajax({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                url: "{{ url('/tambah') }}",
                type: 'POST',
                cache: false,
                data: {  '_token': $_token, 'id' : id, 'qty' : qty},
                success: function(data) {
                    $('#listPesanan').append(data);
                    $('#pesanan').prop('selectedIndex',0);
                    $('#quantity').val('');
                    $('#pesan').prop('disabled', false);

                    
                }
            });
        });
    </script>
  </body>
</html>