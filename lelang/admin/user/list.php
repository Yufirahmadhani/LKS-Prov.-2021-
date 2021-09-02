
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Email</th>
		  <th>Full_name</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    
                    $qry = "SELECT * FROM user WHERE role = 'bidder' order by id desc";
                    $execute = mysqli_query($koneksi,$qry); 
                    $no = 1;
                    while($list = mysqli_fetch_array($execute)){
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$list['nama']?></td>
                        <td><?=$list['email']?></td>
                        <td><?=$list['full_name']?></td>
                        <td align="center">
                            <div class="btn-group">
                                <?php if($list['status'] == 'aktif') {?>
                                    <a href="user/act.php?act=inactive&&id=<?=$list['id']?>" class="btn btn-sm btn-success">Aktif</a>
                                <?php } else { ?>
                                    <a href="user/act.php?act=active&&id=<?=$list['id']?>" class="btn btn-sm btn-danger">Nonaktif</a>
                                <?php } ?>
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
