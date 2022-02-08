<?php
include 'header.php';

$kode = $_GET['id'];

$kat_sql = "SELECT kategori FROM kategori WHERE id_kategori='".$koneksi->real_escape_string($kode)."'";

$kat_qry = $koneksi->query($kat_sql);

$kat = $kat_qry->fetch_assoc();

if (isset($_POST['hapus_btn'])) {
	$pilihan = $_POST['opt_hapus'];

	switch ($pilihan) {
		case 'hapus':

			//Hapus Kategori berita
			$del_kat_sql = "DELETE FROM kategori WHERE id_kategori = '$kode'";
			//Hapus berita berdasarkan id_kategori
			$del_berita_sql = "DELETE FROM berita WHERE id_kategori = '$kode'";

			//Hapus gambar dalam berita berdasarkan id_kategori
			$gambar_sql = "SELECT gambar FROM berita WHERE id_kategori = '$kode'";
			$gambar_qry = $koneksi->query($gambar_sql) or die ($koneksi->error);
			while ($data_gbr = $gambar_qry->fetch_assoc()) {
				unlink('../images/'.$data_gbr['gambar']);
			}

			//Menjalankan query hapus untuk berita & kategori
			$del_kat_qry = $koneksi->query($del_kat_sql) or die ($koneksi->error);
			$del_berita_qry = $koneksi->query($del_berita_sql) or die ($koneksi->error);

			echo "<script>alert('Data Berhasil Dihapus'); window.location = 'kategori-data.php'</script>";

			break;

		case 'pindah':
			//Hapus Kategori Berita
			$del_kat_qry = "DELETE FROM kategori WHERE id_kategori = '$kode'";
			$del_kat = $koneksi->query($del_kat_qry) or die ($koneksi->error);

			//Pindahkan Berita ke Kategori "Uncategorized"
			$mv_berita_qry = "UPDATE berita SET id_kategori = '4' WHERE id_kategori = '$kode'";
			$mv_berita = $koneksi->query($mv_berita_qry) or die ($koneksi->error);

			echo "<script>alert('Data Berhasil Dihapus'); window.location = 'kategori-data.php'</script>";

			break;

		default:
			header('location: kategori-data.php');
			break;
	}
}
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
						<div class="col-md-12">
							<h2 class="page-header"><i class="fa fa-folder-o"></i> Hapus Kategori: <strong><?php echo $kat['kategori']; ?></strong></h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form action="" method="POST">
								<div class="form-group">
									<input type="radio" name="opt_hapus" value="pindah" checked="true"> Pindahkan semua posting dalam kategori ini ke "Uncategorized"
								</div>
								<div class="form-group">
									<input type="radio" name="opt_hapus" value="hapus"> Hapus semua posting dalam kategori ini
								</div>
								<div class="form-group">
									<a class="btn btn-danger btn-sm" href="kategori-data.php"><i class="fa fa-times"></i> Batal</a>
									<button class="btn btn-success btn-sm" name="hapus_btn" type="submit">
										<i class="fa fa-check"></i> Ya
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>