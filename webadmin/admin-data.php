<?php include ("header.php"); ?>
<?php
$limit = 5;
if(isset($_GET['p']))
{
    $noPage = $_GET['p'];
}
else $noPage = 1;

$offset = ($noPage - 1) * $limit;

$sql = "SELECT id_admin, username, password, nama_admin, foto, deskripsi, level
FROM admin
LIMIT ".$offset.",". $limit;

$qry = $koneksi->query($sql) or die($koneksi->error);

$sql_rec = "SELECT id_admin FROM admin";

$total_rec = $koneksi->query($sql_rec);

$total_rec_num = $total_rec->num_rows;

$total_page = ceil($total_rec_num/$limit);
?>

<div class="container-fluid body">
    <div class="row">
        <div class="col-lg-2 sidebar">
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="col-lg-10 main-content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">


                        <?php
    if (isset($_POST['btn_simpan'])) {
        $message = array();
    
        if (trim($_POST['txt_username'])=="") {
            $message[] = "Username tidak boleh kosong!";
        }
        if (trim($_POST['txt_nmlengkap'])=="") {
            $message[] = "Nama Lengkap tidak boleh kosong!";
        }
    
        if (!empty($_POST['txt_password'])) {
            $password = md5($_POST['txt_password']);
            if (empty($_POST['txt_kpassword'])) {
                $message[] = "Konfirmasi Password tidak boleh kosong!";
            } elseif(md5($_POST['txt_kpassword']) != $password){
                $message[] = "Konfirmasi Password tidak sesuai!";
            }
        }

    
        $txt_password = $password;
        $txt_username = $koneksi->real_escape_string($_POST['txt_username']);
        $txt_nmlengkap = $koneksi->real_escape_string($_POST['txt_nmlengkap']);
        $txt_level = $koneksi->real_escape_string($_POST['txt_level']);
        $txt_deskripsi = $koneksi->real_escape_string($_POST['txt_deskripsi']);
    
        if (count($message)==0) {
            $sql_insert = "INSERT INTO admin(id_admin, username, password, nama_admin, deskripsi, level) 
                                VALUES ('',
                                        '$txt_username',
                                        '$txt_password',
                                        '$txt_nmlengkap',
                                        '$txt_deskripsi',
                                        '$txt_level') ";
    
            $qry_insert = $koneksi->query($sql_insert);
            if(!$qry_insert){
                die($koneksi->error);
            } else { ?>
                        <div class="alert alert-success alert-dismissable fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php
                                echo "<script>alert('Data Berhasil Ditambah');</script>";
                                echo "<script>window.location = 'admin-data.php'</script>";
                            ?>
                        </div>
                        <?php }
        } else {
            $num = 0;
            foreach($message as $index => $show_message){
                $num++;
                ?>
                        <div class="alert alert-danger alert-dismissable fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php
                                echo "<script>alert('Data Gagal Ditambahkan');</script>";
                                echo "<script>window.location = 'admin-data.php'</script>";
                            ?>
                        </div>
                <?php
                }
            }
        }
                ?>
                        <div class="col-md-12">
                            <h2 class="page-header"><i class="fa fa-user-plus"></i> Tambah Admin / Author</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12" id="DIVinput" style="display: none;">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control input-sm" name="txt_username" type="text"
                                            placeholder="Username" name="txt_username" required autofocus></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input class="form-control input-sm" type="password" placeholder="Password"
                                            name="txt_password" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Konfirmasi Password</label>
                                        <input class="form-control input-sm" type="password"
                                            placeholder="Konfirmasi Password" name="txt_kpassword" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control input-sm" name="txt_nmlengkap"
                                            maxlength="30" placeholder="Nama Lengkap" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control input-sm" name="txt_deskripsi" rows="5"
                                            placeholder="Deskripsi" name="txt_deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Level Akses</label><br>
                                        <select name="txt_level" id="txt_level" class="form-control select">
                                            <option value="admin">Admin</option>
                                            <option value="author">Author</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-default" type="submit" name="btn_simpan"
                                            id="btn_simpan"><i class="fa fa-save"></i>
                                            Simpan Admin</button>
                                    </div>
                                </form>
                            </div>
                            <div class="form-group">
                                <button onclick="showInput()" class="btn btn-sm btn-primary" type="submit"
                                    name="btn_tambah" id="btn_tambah"><i class="fa fa-user-plus"></i>
                                    Tambah Admin</button>
                            </div>
                            <div class="clear"></div>
                            <hr>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: right" hidden>ID Admin</th>
                                        <th width="5%" style="text-align: center">No</th>
                                        <th width="5%" style="text-align: center">Username</th>
                                        <th width="10%" style="text-align: center">Nama Admin</th>
                                        <th width="30%" style="text-align: center">Deskripsi</th>
                                        <th width="5%" style="text-align: center">Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$no = 1; 
									while ($admin_list = $qry->fetch_assoc()) { 
									?>
                                    <tr>
                                        <td style="text-align: center" hidden><?php echo $admin_list['id_admin']; ?>
                                        </td>
                                        <td style="text-align: center"><?php echo $no++; ?></th>
                                        <td style="text-align: center"><?php echo $admin_list['username']; ?></td>
                                        <td style="text-align: center"><?php echo $admin_list['nama_admin']; ?></td>
                                        <td style="text-align: center"><?php echo $admin_list['deskripsi']; ?></td>
                                        <td style="text-align: center"><?php echo $admin_list['level']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <ul class="pagination">
                                <?php if ($noPage > 1) { ?>

                                <li>
                                    <a href="<?php echo "admin-data.php?p=".($noPage-1); ?>">
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                    </a>
                                </li>

                                <?php } ?>

                                <?php for ($page=1; $page <= $total_page ; $page++) { ?>
                                <?php if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $total_page)) { ?>
                                <?php
										$showPage = $page;
										if ($page==$total_page && $noPage <= $total_page-5) echo "<li class='active'><a>...</a></li>";
            							if ($page == $noPage) echo "<li class='active'><a href='#'>".$page."</a></li> ";
            							else echo " <li><a href='".$_SERVER['PHP_SELF']."?p=".$page."'>".$page."</a></li> ";
            							if ($page == 1 && $noPage >=6) echo "<li class='active'><a>...</a></li>";
									?>
                                <?php } ?>
                                <?php } ?>

                                <?php if ($noPage < $total_page) { ?>
                                <li>
                                    <a href="<?php echo "admin-data.php?p=".($noPage+1); ?>">
                                        <i class="glyphicon glyphicon-chevron-right"></i>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ("footer.php"); ?>