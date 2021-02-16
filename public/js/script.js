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

      var id = $(this).data("id");
      // console.log(id);

      $.ajax({
         url : 'http://localhost:8080/pekerjaan/getId',
         method : 'post',
         dataType : 'json',
         data : {id: id},
         success: function(data) {
            console.log(data);
            $('#id').val(data.id);
            $('#pekerjaan').val(data.pekerjaan);
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

      var id = $(this).data("id");
      // console.log(id);

      $.ajax({
         url : 'http://localhost:8080/pendidikan/getId',
         method : 'post',
         dataType : 'json',
         data : {id: id},
         success: function(data) {
            console.log(data);
            $('#id').val(data.id);
            $('#pendidikan').val(data.pendidikan);
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

      var id = $(this).data("id");
      // console.log(id);

      $.ajax({
         url : 'http://localhost:8080/agama/getId',
         method : 'post',
         dataType : 'json',
         data : {id: id},
         success: function(data) {
            console.log(data);
            $('#id').val(data.id);
            $('#agama').val(data.agama);
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

      var id = $(this).data("id");
      // console.log(id);

      $.ajax({
         url : 'http://localhost:8080/penghasilan/getId',
         method : 'post',
         dataType : 'json',
         data : {id: id},
         success: function(data) {
            console.log(data);
            $('#id').val(data.id);
            $('#penghasilan').val(data.penghasilan);
         }
      });
   });

});