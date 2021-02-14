$(function() {
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

   $('#formPekerjaanTambah').click(function() {
      $('#formModalLabelPekerjaan').html('Tambah Data Pekerjaan');
      $('.modal-body form').attr('action', '/pekerjaan/create');
      $('.modal-footer button[type=submit]').html('Simpan');
   });
});