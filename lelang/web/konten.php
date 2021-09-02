<?php 
include "config/koneksi.php";

$page = $_GET['page'];


if( $page == 'barang'){
  ?>
  <div class="site-section">
          <div class="container">
            <?php 
            $mtr = mysqli_query($koneksi,"SELECT * FROM barang WHERE kategori = 'motor'");
            $mbl = mysqli_query($koneksi,"SELECT * FROM barang WHERE kategori = 'mobil'");
            
            $jml_mobl = mysqli_num_rows($mbl);
            $jml_motr = mysqli_num_rows($mtr); //var_dump($jml_motr);
            ?>
            <div class="row">
              <div class="col-md-3">
                <div class="side-box mb-5">
                  <h3>Categories</h3>
                  <ul class="list-unstyled auction-categories">
                    <li><a href="#">Motor <span><?=$jml_motr?></span></a></li>
                    <li><a href="#">Mobil <span><?=$jml_mobl?></span></a></li>
                  </ul>
                </div>
               
              </div>
              <div class="col-md-9">
                <div class="row auctions-entry">

                <?php 
                  $query = "SELECT * FROM barang order by tgl_buka asc";
                  $execute = mysqli_query($koneksi,$query);

                  while($data = mysqli_fetch_array($execute)){
                ?>
                  <div class="col-6 col-md-4 col-lg-4">
                    <div class="item">
                      <div>
                        
                        <a href="main.php?page=item&&id=<?=$data['id']?>"><img width="300px" src="../img/<?=$data['foto']?>" alt="Image" class="img-fluid"></a>
                      </div>
                      <div class="p-4">
                        <h3><a href="main.php?page=item&&id=<?=$data['id']?>"><?=$data['nama_barang']?></a></h3>
                        <div class="d-flex mb-2">
                          <span><?=$data['kategori']?></span>
                          <span class="ml-auto">Rp. <?=number_format($data['harga_buka'])?></span>
                        </div>
                        <a href="main.php?page=item&&id=<?=$data['id']?>" class="btn  btn-primary">Input Penawaran</a>
                      </div>

                    </div>
                  </div>
                <?php } ?>
                  
                  
                 
                </div>
            </div>

          </div>
        </div>
  <?php
}

if($page == 'login'){
  ?>
    <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <h2 class="mb-5 text-black"><strong>Log In</strong></h2>
              <form method="post" action="../config/login.php">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">username</label>
                    <input required type="text" id="name" name="name" class="form-control form-control-lg">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="passlogin">Password</label>
                    <input required type="password" id="passlogin" name="password" class="form-control form-control-lg">
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-12">
                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-lg px-5">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-5">
              <h2 class="mb-5 text-black"><strong>Registrasi</strong></h2>

              <form method="POST" action="../config/register.php">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">username</label>
                    <input required type="text" id="name" name="name" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="fpass">Password</label>
                    <input required type="password" id="fpass" name="password" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="fpass2">Re-type Password</label>
                    <input required type="password" id="fpass2" name="password2" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="femail">Email</label>
                    <input required type="email" id="email" name="email" class="form-control form-control-lg">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="fullname">full_name</label>
                    <input required type="text" id="fullname" name="full_name" class="form-control form-control-lg">
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-12">
                    <input type="submit" value="Register" class="btn btn-primary btn-lg px-5">
                  </div>
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
  <?php
    if($_GET['message'] == 'failregis')
    {
      echo "<script>
        alert('Registrasi Gagal');
      </script>";
    }
}

if($page == 'kontak') {
  ?>
   <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="mb-5 text-black">Get <strong>In Touch</strong></h2>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="fname">First Name</label>
                  <input type="text" id="fname" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" id="lname" class="form-control form-control-lg">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="eaddress">Email Address</label>
                  <input type="text" id="eaddress" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                  <label for="tel">Tel. Number</label>
                  <input type="text" id="tel" class="form-control form-control-lg">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
                </div>
              </div>
            </div>
            <div class="col-lg-5 ml-auto">
              <div class="mb-3 bg-white">
                <h3 class="mb-5 text-black">Contact Info</h3>
                <p class="mb-0 font-weight-bold text-black">Address</p>
                <p class="mb-4 text-black">SMKN 1 Batam, Kepulauan Riau</p>

                <p class="mb-0 font-weight-bold text-black">Phone</p>
                <p class="mb-4"><a href="#">085265449999</a></p>

                <p class="mb-0 font-weight-bold text-black">Email Address</p>
                <p class="mb-0"><a href="#">yufirahmadhani27@gmail.com</a></p>

              </div>
            </div>
          </div>
          
        </div>
      </div>
  <?php
}

if($page == 'item'){
  ?>
    <?php 
      $id = $_GET['id'];
      $query = "SELECT * FROM barang JOIN admin ON admin.id = barang.user_id WHERE barang.id = $id";
      $execute = mysqli_query($koneksi,$query); //var_dump($execute);
      $item = mysqli_fetch_array($execute);

      $query2 = "SELECT * FROM t_lelang WHERE barang_id = $id";
      $execute2 = mysqli_query($koneksi,$query2);
      
      $query3 = "SELECT * FROM t_lelang WHERE barang_id = $id AND status = 'terpilih'";
      $check = mysqli_query($koneksi,$query3);

      $status = '';
      $terima = mysqli_num_rows($check);
      
      $mulai = date('Y-m-d'); // waktu mulai
      $expr = $item['tgl_tutup']; // batas waktu
      if ($mulai >= $expr) {
        $exp = 1;
      } else {
        $exp = 0;
      }

      
      if($terima > 0 || $exp > 0){
        $status = 'disabled';
      }

    ?>
    <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 order-lg-2">
              <div class="side-box mb-4">
                <p>
                  <table>
                    <tr>
                      <td>Harga Buka</td><td>: <strong class="text-black">Rp. <?=number_format($item['harga_buka'])?></strong></td>
                    </tr>
                    <tr>
                      <td>Tanggal Tutup</td><td>: <strong class="text-black"><?=date('d/m/Y',strtotime($item['tgl_tutup']))?></strong></td>
                    </tr>
                    <!-- <tr>
                      <td>Jumlah Kandidat</td><td>: <strong class="text-black">4</strong></td>  
                    </tr> -->
                  </table>
                </p>
                <form action="bid.php" method="post">
                  <div class="mb-4">
                    <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    <input type="hidden" name="owner" value="<?=$item['user_id']?>">
                    <input type="text" name="kandidat" class="form-control mb-2" placeholder="Input Nama Anda" required>
                    <input type="text" name="nope" class="form-control mb-2" placeholder="Input Nomor HP/WA Anda" required> 
                    <input type="number" min="<?=$item['harga_buka']?>" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Harga Tawaran Harus Melebihi Harga Lelang')" name="harga_tawaran" class="form-control mb-2" placeholder="Nilai Tawaran" required>
                    <button type="submit" class="btn btn-block btn-primary" <?=$status?>>Tawar</button>
                  </div>
                </form>
              </div>
              <div class="side-box text-center">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                <h3 class="h5 text-black"><?=$item['nama']?></h3>
                <span class="mb-3 d-block text-muted">Owner</span>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil repudiandae recusandae, incidunt possimus provident vel facilis!</p> -->
              </div>
            </div>
            <div class="col-lg-8 pr-lg-5">
              <div class="owl-carousel slide-one-item mb-5">
                <img src="../img/<?=$item['foto']?>" alt="Image" class="img-fluid mb-54">
              </div>
              <?=$item['keterangan']?>
              

              <h2 class="my-4">Peserta Lelang</h2>
              <?php $no = 1; while($bidders = mysqli_fetch_array($execute2)){?>
              <ul class="list-unstyled bidders">
                <li class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                    <span class="mr-2"><?=$no++?>.</span>
                    <div class="d-flex align-items-center">
                      <span><?=$bidders['kandidat']?> - [<?=$bidders['status']?>]</span>
                      <span></span>
                    </div>
                  </div>
                  <span class="price">Rp. <?=number_format($bidders['harga_tawar'])?></span>
                </li>
              </ul>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
  <?php
}

if($page == ''){
  ?>
   <div class="site-section">
          <div class="container">
            <div class="row mb-4">
              <div class="col-md-7 mb-5 text-center mx-auto">
                <span class="caption">Lelang</span>
                <h2 class="text-black">Daftar <strong>Lelang</strong></h2>
              </div>
            </div>
            <div class="row auctions-entry">
            <?php 
                  $query = "SELECT * FROM barang order by tgl_buka asc";
                  $execute = mysqli_query($koneksi,$query);

                  while($data = mysqli_fetch_array($execute)){
                ?>
                  <div class="col-6 col-md-4 col-lg-4">
                    <div class="item">
                      <div>
                        
                        <a href="main.php?page=item&&id=<?=$data['id']?>"><img width="300px" src="../img/<?=$data['foto']?>" alt="Image" class="img-fluid"></a>
                      </div>
                      <div class="p-4">
                        <h3><a href="main.php?page=item&&id=<?=$data['id']?>"><?=$data['nama_barang']?></a></h3>
                        <div class="d-flex mb-2">
                          <span><?=$data['kategori']?></span>
                          <span class="ml-auto">Rp. <?=number_format($data['harga_buka'])?></span>
                        </div>
                        <a href="main.php?page=item&&id=<?=$data['id']?>" class="btn  btn-primary">Input Penawaran</a>
                      </div>

                    </div>
                  </div>
                <?php } ?>
            </div>
          </div>
        </div>
  <?php
}

?>