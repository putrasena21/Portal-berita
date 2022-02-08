<div class="footer">
    <div class="container">
        <span class="copyright">Copyright &copy; <?php echo date('Y'); ?> Berita 1NFO </span>
    </div>
</div>
<div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3><span class="fa fa-question-circle"></span>&nbsp;&nbsp;Anda Yakin Ingin Keluar?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-times"></i>&nbsp;&nbsp;Tidak
                </button>
                <a href="logout.php" class="btn btn-success">
                    <i class="fa fa-check"></i>&nbsp;&nbsp;Ya
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $(document).ready(function () {
    //     $('[data-toggle="tooltip"]').tooltip();
    // });

    $(document).ready(function () {
		$("#summernote").summernote({
			height: 250
		});
	})

    function showInput() {
    var x = document.getElementById("DIVinput");
    var y = document.getElementById("btn_tambah");
    if (x.style.display === "none") {
        x.style.display = "Block";
        y.classList.toggle("btn-danger");
        y.innerHTML = "<i class='fa fa-times'>" + 
                      " Batal";
    } 
    else {
        x.style.display = "none";
        y.classList.toggle("btn-primary");
        y.innerHTML = "<i class='fa fa-user-plus'>" + 
                      " Tambah Admin";
    }
}
</script>
</body>

</html>