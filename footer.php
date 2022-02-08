<?php
$politik = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_admin,
berita.dilihat,
kategori.id_kategori
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
WHERE
berita.id_kategori = "16"
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5';

$olahraga = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_admin,
berita.dilihat,
kategori.id_kategori
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
WHERE
berita.id_kategori = "11"
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5';

$bisnis = 'SELECT
berita.id_berita,
berita.judul,
berita.gambar,
berita.tgl_posting,
berita.id_admin,
admin.nama_admin,
berita.dilihat,
kategori.id_kategori
FROM
berita
INNER JOIN admin ON berita.id_admin = admin.id_admin
INNER JOIN kategori ON kategori.id_kategori = berita.id_kategori
WHERE
berita.id_kategori = "10"
ORDER BY
berita.tgl_posting DESC
LIMIT 0, 5';

$list_politik = $koneksi->query($politik) or die("Error Politik:".$koneksi->error);
$list_olahraga = $koneksi->query($olahraga) or die("Error Olahraga".$koneksi->error);
$list_bisnis = $koneksi->query($bisnis) or die("Error Bisnis".$koneksi->error);
 ?>
<div class="container-fluid footer">
	<div class="row footer-upper">
		<div class="container">
			<div class="col-md-4">
				<h3 class="page-header">Politik</h3>
				<ul class="news-list">
				<?php while ($politik_list = $list_politik->fetch_array()) { ?>
					<li>
						<a href="<?php echo $base_url."detail.php?id=".$politik_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $politik_list['judul'])); ?>">
							<img src="<?php echo $base_url."images/".$politik_list['gambar']; ?>" class="img-responsive wow fadeIn">
						</a>
						<p>Oleh: <a href="<?php echo $base_url."penulis.php?id=".$politik_list['id_admin']; ?>"><?php echo $politik_list['nama_admin']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $politik_list['tgl_posting']; ?></p>
						<a href="<?php echo $base_url."detail.php?id=".$politik_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $politik_list['judul'])); ?>">
							<?php echo $politik_list['judul']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h3 class="page-header">Bisnis</h3>
				<ul class="news-list">
				<?php while ($bisnis_list = $list_bisnis->fetch_array()) { ?>
					<li>
						<a href="<?php echo $base_url."detail.php?id=".$bisnis_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $bisnis_list['judul'])); ?>">
							<img src="<?php echo $base_url."images/".$bisnis_list['gambar']; ?>" class="img-responsive wow fadeIn">
						</a>
						<p>Oleh: <a href="<?php echo $base_url."penulis.php?id=".$bisnis_list['id_admin']; ?>"><?php echo $bisnis_list['nama_admin']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $bisnis_list['tgl_posting']; ?></p>
						<a href="<?php echo $base_url."detail.php?id=".$bisnis_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $bisnis_list['judul'])); ?>">
							<?php echo $bisnis_list['judul']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="col-md-4">
				<h3 class="page-header">Olahraga</h3>
				<ul class="news-list">
				<?php while ($olahraga_list = $list_olahraga->fetch_array()) { ?>
					<li>
						<a href="<?php echo $base_url."detail.php?id=".$olahraga_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $olahraga_list['judul'])); ?>">
							<img src="<?php echo $base_url."images/".$olahraga_list['gambar']; ?>" class="img-responsive wow fadeIn">
						</a>
						<p>Oleh: <a href="<?php echo $base_url."penulis.php?id=".$olahraga_list['id_admin']; ?>"><?php echo $olahraga_list['nama_admin']; ?></a>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;<?php echo $olahraga_list['tgl_posting']; ?></p>
						<a href="<?php echo $base_url."detail.php?id=".$olahraga_list['id_berita']."&amp;judul=".strtolower(str_replace(" ", "-", $olahraga_list['judul'])); ?>">
							<?php echo $olahraga_list['judul']; ?>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row footer-bottom">
		<div class="col-md-12">
			<span class="copy">Copyright &copy; <?php echo date('Y');?> Berita 1NFO</span>
		</div>
	</div>
</div>
<script src="<?php echo $base_url; ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>assets/ticker/jquery.ticker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/wow/dist/wow.min.js"></script>
<script src="<?php echo $base_url; ?>dist/js/ebisnis.js"></script>
</body>
</html>
