
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Lelang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Highest Bidder</th>
                  <th>Barang</th>
                  <th>Open Bid Amount</th>
                  <th>Harga Tawar</th>
                  <th>Closing Time</th>
                  <th>Status</th>
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

                    $qry = "SELECT * FROM auction INNER JOIN t_lelang  ON t_lelang.title = title  WHERE t_lelang.title = $userid order BY t_lelang.harga_tawar DESC";
                    $execute = mysqli_query($koneksi,$qry); 
                    $no = 1;
                    while($list = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$list['highest_bidder']?><br><small><strong><?=$list['nope_kandidat']?></strong></small></td>
                        <td><?=$list['title']?></td>
                        <td>Rp. <?=number_format($list['open_bid_amount'])?></td>
                        <td>Rp. <?=number_format($list['harga_tawar'])?></td>
                        <td><?=datetime('Y/m/d H:i:s',strtotime($list['closing_time']))?></td>
                        <?php if($list['status'] == 'pending' ){$string = 'danger';} else {$string = 'success';} ?>
                        <td align="center"><span class="label label-<?=$string?>"><?=$list['status']?></span></td>
                        <td align="center">
                            <div class="btn-group">
                                <a href="lelang/act.php?id=<?=$list['id']?>" class="btn btn-sm btn-primary">Pilih</a>
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
