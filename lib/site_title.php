<?php
function site_title() {
	global $koneksi;
	$site_title = 'Berita 1NFO';
	$url = $_SERVER['REQUEST_URI'];
	$explode_url = explode("/", $url);
	if (!isset($_GET['id'])) {
		switch ($explode_url[2]) {
			case '':
				$site_subtitle = 'Sumber berita terpercaya';
				$title = $site_title." | ".$site_subtitle;
				break;

			case 'index.php':
				$site_subtitle = 'Sumber berita terpercaya';
				$title = $site_title." | ".$site_subtitle;
				break;

			case 'tentang.php':
				$site_subtitle = 'Tentang Berita 1NFO';
				$title = $site_subtitle." | ".$site_title;
				break;

			case 'kontak.php':
				$site_subtitle = 'Kontak Kami';
				$title = $site_subtitle." | ".$site_title;
				break;

			default:
				$site_subtitle = 'Halaman Tidak Ditemukan';
				$title = $site_subtitle." | ".$site_title;
				break;
		}
	} else {
		$id = $_GET['id'];
		$explode_again = explode("?", $explode_url[2]);
		switch ($explode_again[0]) {
			case 'kategori.php':
				$sql = "SELECT kategori FROM kategori WHERE id_kategori='".$id."'";
				$qry = $koneksi->query($sql) or die($koneksi->error);
				$data = $qry->fetch_assoc();
				$site_subtitle = $data['kategori'];
				break;

			case 'detail.php':
				$sql = "SELECT judul FROM berita WHERE id_berita='".$id."'";
				$qry = $koneksi->query($sql) or die("Error di title berita:".$koneksi->error);
				$data = $qry->fetch_assoc();
				$site_subtitle = $data['judul'];
				break;

			case 'penulis.php':
				$sql = "SELECT nama_admin FROM admin WHERE id_admin='".$id."'";
				$qry = $koneksi->query($sql) or die("Error di title kategori:".$koneksi->error);
				$data = $qry->fetch_assoc();
				$site_subtitle = "Berita oleh ".$data['nama_admin'];
				break;
		}
		$title = $site_subtitle." | ".$site_title;
	}

	if (isset($_GET['q'])) {
		$q = $_GET['q'];
		$site_subtitle = 'Search: '.$q;
		$title = $site_subtitle." | ".$site_title;
	}

	if (isset($_GET['p'])) {
		$explode_again = explode("?", $explode_url[2]);
		switch ($explode_again[0]) {
			case 'index.php':
				$site_subtitle = 'Sumber berita terpercaya';
				$title = $site_title." | ".$site_subtitle;
				break;
			case 'kategori.php':
				$site_subtitle = $data['kategori'];
				$title = $site_subtitle." | ".$site_title;
				break;
			case 'detail.php':
				$site_subtitle = $data['judul'];
				$title = $site_subtitle." | ".$site_title;
				break;
			case 'penulis.php':
				$site_title = $data['nama_admin'];
				$title = $site_subtitle." | ".$site_title;
				break;
			case 'search.php';
				$site_subtitle = 'Search: '.$q;
				$title = $site_subtitle." | ".$site_title;
		}
	}

	return $title;
}