<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kendaraan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="barang/act.php?act=add" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Merk Kendaraan</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Input Nama Barang" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori Barang</label>
                  <select name="kategori" class="form-control" id="kategori" required>
                   <option disabled selected>--Pilih Kategori--</option>
                   <option value="motor">Motor</option>
                   <option value="mobil">Mobil</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="textarea" placeholder="Keterangan"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <label for="closing_time">Closing Time</label>
                  <input type="datetime" name="closing_time" class="form-control" id="closing_time" required>
                </div>
                <div class="form-group">
                  <label for="open_bit_amount">Open Bit Amount</label>
                  <input type="text" name="open_bit_amount" class="form-control" id="open_bit_amount" placeholder="Input Harga" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Input Gambar</label>
                  <input type="file" name="barang" id="exampleInputFile" required>
                  <p class="help-block">*Format JPG/PNG.</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>
