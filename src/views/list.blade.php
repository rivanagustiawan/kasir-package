<tr>
    <input type="hidden" name="id_barang[]" value="{{ $data_barang['id'] }}">
    <td><input type="text" name="nama_barang[]" value="{{ $data_barang['nama_barang'] }}" readonly class="form-control-plaintext"> </td>
    <td><input type="text" name="quantity[]" value="{{ $qty }}" readonly class="form-control-plaintext"> </td>
    <td><input type="text" name="total_harga[]" value="{{ $data_barang['harga_barang']*$qty }}" readonly class="form-control-plaintext"> </td>
</tr>