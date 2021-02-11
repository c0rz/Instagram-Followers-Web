function formatRupiah(angka, prefix="Rp. "){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
function sanitize(string) {
  const map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#x27;',
      "/": '&#x2F;',
  };
  const reg = /[&<>"'/]/ig;
  return string.replace(reg, (match)=>(map[match]));
}

$('input[name=super]').on('click', function() {
    $('#price').val("");
    id =$(this).val();
     $.ajax({
         url   : "/ajax/order-get-category.php",
         type  : "GET",
         data  :{super:id},
         success: function(data, textStatus, jqXHR){
             $('#category').html(data);
             $("#catid").removeAttr('disabled');
         },
         error: function (jqXHR, exception) {
           $('#catid').html('<option disabled selected>Pilih Layanan</option>');
        }
     });
  });
  $('#lengkapi').click(function(){
    var layanan = $('#service').find(":selected").val().trim();
    if(layanan == 0){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Harap isi semua form dengan lengkap'
      })
      setTimeout(function(){
        $("#prev2").click();
      },1000);
    }
  });
$('#checkout').click(function(){
    var layanan = $('#service').find(":selected").text();
    var data = $('#singleorder').val().trim();
    var nama = $('#nama').val().trim();
    var harga = $('#price').val().trim();
    var nomorhp = $('#nomorhp').val().trim();
    var kodeunik = $('#unik').text().trim();
    if(data.length <= 1 || nama.length <= 1 || nomorhp.length <= 1){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Periksa kembali form anda'
      })
      setTimeout(function(){
        $("#prev3").click();
      },1000);
    }
    $('#islayanan').html(layanan);
    $('#isdata').html(sanitize(data));
    $('#isnama').html(sanitize(nama));
    $('#isnomorhp').html(nomorhp);
    $('#isharga').html(formatRupiah(harga));
    var total = parseInt(harga)+parseInt(kodeunik);
    console.log(total);
    $('#istotal').html(formatRupiah(total.toString()));
    $("input[type='radio']:checked").each(function() {
        var idVal = $(this).attr("id");
        var bg = $("label[for='"+idVal+"']").css("background-image");
        bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
        $("#isimg").attr("src",bg);
    });
  });
  $(document).on('click', '#order', function(e) {
      Swal.fire({
          title: 'Konfirmasi Data',
          text: "Apakah data-data yang anda masukkan sudah benar? *Detail order tidak dapat diubah dikemudian hari",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sudah Benar'
      }).then((result) => {
        if (result.value) {
          let timerInterval
            Swal.fire({
            title: 'Terimakasih!',
            text: 'Pemesanan berhasil! anda akan dialihkan ke invoice pesanan.....',
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                    b.textContent = Swal.getTimerLeft()
                    }
                }
                }, 100)
            },
            onClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                $('#submitformmmmm').click();
            }
            })
          
        }
      })
});

promoBox({
    imagePath: demoImage,
    fadeInDuration: 0.33,
    fadeOutDuration: 0.2
  });