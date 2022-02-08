$(document).ready(function(){
	$("#headlines").ticker({ effect: "slideUp", interval: 4000});

	$( "#search" ).click(function() {
  		$( "#search-form" ).focus();
	});
    hide_labels();
});

function hide_labels () {
    $("#nama_label").hide();
    $("#email_label").hide();
    $("#email_label_invalid").hide();
    $("#komentar_label").hide();
}

$(document).ready(function(){

	var clickEvent = false;
	$('#myCarousel').carousel({
		interval:   4000
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');
			}
		}
		clickEvent = false;
	});
})

$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
});

new WOW().init();

function kirimPesan () {
    var data = $("#formPesan").serialize();
    $.ajax({
        type: "POST",
        url: "lib/kirim-pesan.php",
        dataType: 'json',
        data: data,
        beforeSend: function(){
            $('#btn-kirim').html("<i class='fa fa-circle-o-notch fa-spin margin-bottom'></i>&nbsp;&nbsp;MENGIRIM...");
            $('#btn-kirim').attr({"disabled":true});
        },
        success: function(data) {
            if (data.type == "success") {
                output = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                data.text+
                '</div>';
            } else {
                output = '<div class="alert alert-danger alert-dismissable">'+data.text+'</div>';
                $('#btn-kirim').html("<i class='fa fa-send'></i>&nbsp;&nbsp;KIRIM");
            }
            $("#hasil").hide().html(output).slideDown();
            $('#btn-kirim').attr({"disabled":false});
            $('#btn-kirim').html("<i class='fa fa-send'></i>&nbsp;&nbsp;KIRIM");
            $("#nama").val("");
            $("#email").val("");
            $("#subjek").val("");
            $("#pesan").val("");
        }
    });
}

$("#btn-batal, .close").on('click',function(){
    clear_form();
});

function clear_form () {
    $("#nama").val("");
    $("#email").val("");
    $("#komentar").val("");
}

function show_toast() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}