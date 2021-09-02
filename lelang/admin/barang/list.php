
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Barang</h3>
              <a href="main.php?page=barang&&method=add" class="btn btn-success pull-right"> Tambah Barang</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Kategori Barang</th>
                  <th>Open Bid Amount</th>
                  <th>Closing Time</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $email = $_SESSION['email'];
                    $emailuser = mysqli_query($koneksi,"SELECT id FROM user WHERE email = '$email'"); 

                    //$data = mysqli_result($emailuser);
                    $useridx = mysqli_fetch_array($emailuser);
                    $userid = $useridx['id'];

                    $qry = "SELECT * FROM auction WHERE user_id = $userid order by id desc";
                    $execute = mysqli_query($koneksi,$qry); 
                    $no = 1;
                    while($list = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$list['title']?></td>
                        <td><?=$list['kategori']?></td>
                        <td>Rp. <?=number_format($list['open_bid_amount'])?></td>
                        <td><?=date('d-m-Y',strtotime($list['closing_time']))?></td>
                        <td><img src="../img/<?=$list['foto']?>" width="75px" alt="<?=$list['foto']?>"></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="main.php?page=barang&&method=edit&&id=<?=$list['id']?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="barang/act.php?act=hapus&&id=<?=$list['id']?>" class="btn btn-sm btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>  
                    <?php

                    }
                ?>
                 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
