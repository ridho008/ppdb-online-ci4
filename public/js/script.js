$(function() {
   $('#formPekerjaanTambah').click(function() {
      $('#formModalLabelPekerjaan').html('Tambah Data Pekerjaan');
      $('.modal-body form').attr('action', '/pekerjaan/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#pekerjaan').val('');
   });

   $('.formPekerjaanEdit').click(function() {
      $('#formModalLabelPekerjaan').html('Edit Data Pekerjaan');
      $('.modal-body form').attr('action', '/pekerjaan/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get pekerjaan click value
      var pekerjaan = $(this).data('pekerjaan');
      // console.log(pekerjaan);

      // AJAX request
      $.ajax({
         url: "http://localhost:8080/pekerjaan/getRowPekerjaan",
         method: 'post',
         data: {pekerjaan: pekerjaan,[csrfName]: csrfHash },
         dataType: 'json',
         success: function(response){
            // console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.pekerjaan).each(function(key,value){

                  $('#id').val(value.id);
                  $('#pekerjaan').val(value.pekerjaan);
               });
            }else{
               // Error
               alert(response.error);
            }

         }
      });
   });

   // PENDIDIKAN
   $('#formPendidikanTambah').click(function() {
      $('#formModalLabelPendidikan').html('Tambah Data Pendidikan');
      $('.modal-body form').attr('action', '/pendidikan/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#pendidikan').val('');
   });

   $('.formPendidikanEdit').click(function() {
      $('#formModalLabelPendidikan').html('Edit Data Pendidikan');
      $('.modal-body form').attr('action', '/pendidikan/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get pekerjaan click value
      var pendidikan = $(this).data('pendidikan');
      // console.log(pendidikan);

      // AJAX request
      $.ajax({
         url: "http://localhost:8080/pendidikan/getRowPendidikan",
         method: 'post',
         data: {pendidikan: pendidikan,[csrfName]: csrfHash },
         dataType: 'json',
         success: function(response){
            // console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.pendidikan).each(function(key,value){

                  $('#id').val(value.id);
                  $('#pendidikan').val(value.pendidikan);
               });
            }else{
               // Error
               alert(response.error);
            }

         }
      });
   });

   // AGAMA
   $('#formAgamaTambah').click(function() {
      $('#formModalLabelAgama').html('Tambah Data Agama');
      $('.modal-body form').attr('action', '/agama/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#agama').val('');
   });

   $('.formAgamaEdit').click(function() {
      $('#formModalLabelAgama').html('Edit Data Agama');
      $('.modal-body form').attr('action', '/agama/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get pekerjaan click value
      var agama = $(this).data('agama');
      // console.log(agama);

      // AJAX request
      $.ajax({
         url: "http://localhost:8080/agama/getRowAgama",
         method: 'post',
         data: {agama: agama,[csrfName]: csrfHash },
         dataType: 'json',
         success: function(response){
            // console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.agama).each(function(key,value){

                  $('#id').val(value.id);
                  $('#agama').val(value.agama);
               });
            }else{
               // Error
               alert(response.error);
            }

         }
      });
   });

   // $('#formPekerjaanTambah').click(function() {
   //    $('#formModalLabelPekerjaan').html('Tambah Data Pekerjaan');
   //    $('.modal-body form').attr('action', '/pekerjaan/create');
   //    $('.modal-footer button[type=submit]').html('Simpan');
   // });

   // PENGHASILAN
   $('#formPenghasilanTambah').click(function() {
      $('#formModalLabelPenghasilan').html('Tambah Data Penghasilan');
      $('.modal-body form').attr('action', '/penghasilan/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#penghasilan').val('');
   });

   $('.formPenghasilanEdit').click(function() {
      $('#formModalLabelPenghasilan').html('Edit Data Penghasilan');
      $('.modal-body form').attr('action', '/penghasilan/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get penghasilan click value
      var penghasilan = $(this).data('penghasilan');
      console.log(penghasilan);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/penghasilan/getRowPenghasilan",
          method: 'post',
          data: {penghasilan: penghasilan,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.penghasilan).each(function(key,value){

                  $('#id').val(value.id);
                  $('#penghasilan').val(value.penghasilan);
               });
            }else{
               // Error
               alert(response.error);
            }

          }
       });
   });

   // TAHUN AJARAN
   $('#formTahunTambah').click(function() {
      $('#formModalLabelTahun').html('Tambah Data Tahun');
      $('.modal-body form').attr('action', '/tahunAjaran/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#tahun').val('');
      $('#ta').val('');
   });

   $('.formTahunEdit').click(function() {
      $('#formModalLabelTahun').html('Edit Data Tahun');
      $('.modal-body form').attr('action', '/tahunAjaran/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get penghasilan click value
      var tahun = $(this).data('tahun');
      console.log(tahun);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/tahunAjaran/getRowTahunAjaran",
          method: 'post',
          data: {tahun: tahun,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.tahun).each(function(key,value){

                  $('#id').val(value.id);
                  $('#ta').val(value.ta);
                  $('#tahun').val(value.tahun);
               });
            }else{
               // Error
               alert(response.error);
            }

          }
       });
   });

   // JURUSAN
   $('#formJurusanTambah').click(function() {
      $('#formModalLabelJurusan').html('Tambah Data Jurusan');
      $('.modal-body form').attr('action', '/jurusan/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#jurusan').val('');
   });

   $('.formJurusanEdit').click(function() {
      $('#formModalLabelJurusan').html('Edit Data Jurusan');
      $('.modal-body form').attr('action', '/jurusan/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get penghasilan click value
      var jurusan = $(this).data('jurusan');
      console.log(jurusan);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/jurusan/getRowJurusan",
          method: 'post',
          data: {jurusan: jurusan,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.jurusan).each(function(key,value){

                  $('#id').val(value.id);
                  $('#jurusan').val(value.jurusan);
               });
            }else{
               // Error
               alert(response.error);
            }

          }
       });
   });

   // Banner
   $('#formBannerTambah').click(function() {
      $('#formModalLabelBanner').html('Tambah Data Banner');
      $('.modal-body form').attr('action', '/banner/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#banner').val('');
   });

   $('.formBannerEdit').click(function() {
      $('#formModalLabelBanner').html('Edit Data Banner');
      $('.modal-body form').attr('action', '/banner/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get penghasilan click value
      var id = $(this).data('id');
      console.log(id);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/banner/getRowBanner",
          method: 'post',
          data: {id: id,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            // Loop on response
            $(response.banner).each(function(key,value){

               $('#id').val(value.id);
               $('#ket').val(value.ket);
               $('#tampilBanner').attr('src', 'http://localhost:8080/img/' + value.banner);
               $('#bannerLama').val(value.banner);
            });

          }
       });

      // var id = $(this).data("id");
      // // console.log(id);

      // $.ajax({
      //    url : 'http://localhost:8080/banner/getId',
      //    method : 'post',
      //    dataType : 'json',
      //    data : {id: id},
      //    success: function(data) {
      //       console.log(data);
      //       $('#id').val(data.id);
      //       $('#ket').val(data.ket);
      //       $('#tampilBanner').attr('src', 'http://localhost:8080/img/' + data.banner);
      //       $('#bannerLama').val(data.banner);
      //    }
      // });
   });

   // Jalur Masuk
   $('#formJalurTambah').click(function() {
      $('#formModalLabelJalur').html('Tambah Data Jalur Masuk');
      $('.modal-body form').attr('action', '/jalurMasuk/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#jalur_masuk').val('');
      $('#kouta').val('');
   });

   $('.formJalurEdit').click(function() {
      $('#formModalLabelJalur').html('Edit Data Jalur Masuk');
      $('.modal-body form').attr('action', '/jalurMasuk/edit');
      $('.modal-footer button[type=submit]').html('Edit');

      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get penghasilan click value
      var jalur = $(this).data('jalur');
      console.log(jalur);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/jalurMasuk/getRowJalurMasuk",
          method: 'post',
          data: {jalur: jalur,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            // Loop on response
               $(response.jalur).each(function(key,value){

                  $('#id').val(value.id);
                  $('#jalur_masuk').val(value.jalur_masuk);
                  $('#kouta').val(value.kouta);
               });

          }
       });
   });

   // Lampiran
   $('#formLampiranTambah').click(function() {
      $('#formModalLabelLampiran').html('Tambah Data Lampiran');
      $('.modal-body form').attr('action', '/lampiran/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#lampiran').val('');
   });

   // $('.formLampiranEdit').click(function() {
   //    $('#formModalLabelLampiran').html('Edit Data Lampiran');
   //    $('.modal-body form').attr('action', '/lampiran/edit');
   //    $('.modal-footer button[type=submit]').html('Edit');

   //    var id = $(this).data("id");
   //    console.log(id);
   //    // var token =  $('input[name="csrfToken"]').attr('value'); 
   //    var nameToken = $('.txt_csrfname').attr('value');
   //    console.log(nameToken);
   //    $.ajax({
   //       url : 'http://localhost:8080/lampiran/getId',
   //       method : 'POST',
   //       headers: {'X-CSRF-TOKEN': nameToken, '_method': 'post'},
   //       dataType: 'json',
   //       data : {id: id},
   //       success: function(data) {
   //          console.log(data);
   //          $('#id').val(data.id);
   //          $('#lampiran').val(data.lampiran);
   //       }
   //    });
   // });

   $('.formLampiranEdit').click(function() {
      $('#formModalLabelLampiran').html('Edit Data Lampiran');
      $('.modal-body form').attr('action', '/lampiran/edit');
      $('.modal-footer button[type=submit]').html('Edit');
      
      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get lampiran click value
      var lampiran = $(this).data('lampiran');
      console.log(lampiran);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/lampiran/getRowLampiran",
          method: 'post',
          data: {lampiran: lampiran,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.lampiran).each(function(key,value){

                  $('#id').val(value.id);
                  $('#lampiran').val(value.lampiran);
               });
            }else{
               // Error
               alert(response.error);
            }

          }
       });
   });

   // User
   $('#formUserTambah').click(function() {
      $('#formModalLabelUser').html('Tambah Data User');
      $('.modal-body form').attr('action', '/user/create');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#username').val('');
      $('#password').val('');
      $('#id').val('');
      $('#nama').val('');
   });

   $('.formUserEdit').click(function() {
      $('#formModalLabelUser').html('Edit Data User');
      $('.modal-body form').attr('action', '/user/edit');
      $('.modal-footer button[type=submit]').html('Edit');
      
      // CSRF Hash
      var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
      var csrfHash = $('.txt_csrfname').val(); // CSRF hash

      // get lampiran click value
      var username = $(this).data('username');
      console.log(username);

       // AJAX request
       $.ajax({
          url: "http://localhost:8080/user/getRowUser",
          method: 'post',
          data: {username: username,[csrfName]: csrfHash },
          dataType: 'json',
          success: function(response){
            console.log(response);
            // Update CSRF hash
            $('.txt_csrfname').val(response.token);
            
            if(response.success == 1){
               // Loop on response
               $(response.user).each(function(key,value){

                  $('#id').val(value.id);
                  $('#username').val(value.username);
                  $('#nama').val(value.nama);
                  $('#priviewImg').attr('src', 'http://localhost:8080/img/user/' + value.foto);
               });
            }else{
               // Error
               alert(response.error);
            }

          }
       });
   });

});