// image upload untuk soal
$(document).ready( function() {
  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('.btn-file :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;
    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-upload').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#close-pics').hide();
  $('#img-upload').hide();
  $("#imgInp").change(function(){
    readURL(this);
    $('#img-exist').hide();
    $('#img-upload').show();
    $('#close-pics').show();
  });
  $('#close-pics').on('click', function() {
    $('#close-pics').hide();
		$('#img-upload').hide();
		$('#img-exist').show();
    $('#file-label').val("");
    $('#imgInp').val("");
  });
});
// image upload untuk pilihan ganda (A)
$(document).ready( function() {
  $(document).on('change', '#btn-pilih-a :file', function() { //btn-pilih-a
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('#btn-pilih-a :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;
    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-upload-a').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#close-pics-a').hide();
  $("#imgInpA").change(function(){
    readURL(this);
    $('#img-exist-a').hide();
    $('#img-upload-a').show();
    $('#close-pics-a').show();
  });
  $('#close-pics-a').on('click', function() {
    $('#close-pics-a').hide();
		$('#img-upload-a').hide();
		$('#img-exist-a').show();
    $('#file-label-a').val("");
    $('#imgInpA').val("");
  });
});
// image upload untuk pilihan ganda (B)
$(document).ready( function() {
  $(document).on('change', '#btn-pilih-b :file', function() { //btn-pilih-a
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('#btn-pilih-b :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;
    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-upload-b').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#close-pics-b').hide();
  $("#imgInpB").change(function(){
    readURL(this);
    $('#img-exist-b').hide();
    $('#img-upload-b').show();
    $('#close-pics-b').show();
  });
  $('#close-pics-b').on('click', function() {
    $('#close-pics-b').hide();
		$('#img-upload-b').hide();
		$('#img-exist-b').show();
    $('#file-label-b').val("");
    $('#imgInpB').val("");
  });
});
// image upload untuk pilihan ganda (C)
$(document).ready( function() {
  $(document).on('change', '#btn-pilih-c :file', function() { //btn-pilih-a
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('#btn-pilih-c :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;
    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-upload-c').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#close-pics-c').hide();
  $("#imgInpC").change(function(){
    readURL(this);
    $('#img-exist-c').hide();
    $('#img-upload-c').show();
    $('#close-pics-c').show();
  });
  $('#close-pics-c').on('click', function() {
    $('#close-pics-c').hide();
		$('#img-upload-c').hide();
		$('#img-exist-c').show();
    $('#file-label-c').val("");
    $('#imgInpC').val("");
  });
});
// image upload untuk pilihan ganda (D)
$(document).ready( function() {
  $(document).on('change', '#btn-pilih-d :file', function() { //btn-pilih-a
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('#btn-pilih-d :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;
    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-upload-d').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#close-pics-d').hide();
  $("#imgInpD").change(function(){
    readURL(this);
    $('#img-exist-d').hide();
    $('#img-upload-d').show();
    $('#close-pics-d').show();
  });
  $('#close-pics-d').on('click', function() {
    $('#close-pics-d').hide();
		$('#img-upload-d').hide();
		$('#img-exist-d').show();
    $('#file-label-d').val("");
    $('#imgInpD').val("");
  });
});
// image upload untuk pilihan ganda (E)
$(document).ready( function() {
  $(document).on('change', '#btn-pilih-e :file', function() { //btn-pilih-a
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });
  $('#btn-pilih-e :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
    log = label;
    if( input.length ) {
      input.val(log);
    } else {
      if( log ) alert(log);
    }
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-upload-e').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $('#close-pics-e').hide();
  $("#imgInpE").change(function(){
    readURL(this);
    $('#img-exist-e').hide();
    $('#img-upload-e').show();
    $('#close-pics-e').show();
  });
  $('#close-pics-e').on('click', function() {
    $('#close-pics-e').hide();
		$('#img-upload-e').hide();
		$('#img-exist-e').show();
    $('#file-label-e').val("");
    $('#imgInpE').val("");
  });
});
// button toggle input image
function viewImageInput() {
  $("#btn-tambah-gambar-soal").click(function(){
    $("#gambar-soal").fadeToggle();
  });

  $("#gambar-pila").hide();
  $("#img-upload-a").hide();
  $("#btn-tambah-gambar-pila").click(function(){
    $("#gambar-pila").fadeToggle();
  });

  $("#gambar-pilb").hide();
  $("#img-upload-b").hide();
  $("#btn-tambah-gambar-pilb").click(function(){
    $("#gambar-pilb").fadeToggle();
  });

  $("#gambar-pilc").hide();
  $("#img-upload-c").hide();
  $("#btn-tambah-gambar-pilc").click(function(){
    $("#gambar-pilc").fadeToggle();
  });

  $("#gambar-pild").hide();
  $("#img-upload-d").hide();
  $("#btn-tambah-gambar-pild").click(function(){
    $("#gambar-pild").fadeToggle();
  });

  $("#gambar-pile").hide();
  $("#img-upload-e").hide();
  $("#btn-tambah-gambar-pile").click(function(){
    $("#gambar-pile").fadeToggle();
  });
}
// button content tulis dan upload soal
$(document).ready(function(){
  $("#box-tulis-soal").hide();
  $("#box-unggah-soal").hide();
  // 
  $("#btn-close1").click(function(){
    $("#box-tulis-soal").fadeOut();
  });
  $("#btn-close2").click(function(){
    $("#box-unggah-soal").fadeOut();
  });
  $("#btn-close3").click(function(){
    $("#box-report-impor").fadeOut();
  });
  $("#btn-tulis-soal").click(function(){
    $("#box-unggah-soal").fadeOut();
    $("#box-tulis-soal").fadeIn();
  });
  $("#btn-unggah-soal").click(function(){
    $("#box-tulis-soal").fadeOut();
    $("#box-unggah-soal").fadeIn();
  });
});