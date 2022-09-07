<!DOCTYPE html>
<?php 
  include 'connect.php';
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Drawing Report - RnD</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap"><link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="vendor/datatables/dataTables.bootstrap4.css">
</head>

<body style="background: #042669;">
<div class="d-felx flex-column">    
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2" style="padding: 20px;"><img class="img-fluid" src="../assets/images/Astra Visteon.jpg" alt="logo" class="logo"></div>
      <div class="col-md-6 align-items-start">
        <h2 style="padding-top: 20px;margin-bottom: 0px; color: #fff"> Customer Drawing Report </h2>
        <p style="color: #fff"> PT Astra Visteon Indonesia</p>
      </div>
      <div class="col-md-4 align-items-end text-right" style="padding: 20px;"><h3><?php require 'jam.html'; ?></h3></div>
    </div>
    <div class="card" style="width:100%;">
      <div class="card-header"> Customer Drawing Report
        <div class="btn-group"  style="float: right;">
          <button id="btnhome" class="btn btn-sm btn-primary active"><i class="fas fa-home"></i></button>
          <button id="btnsetting" class="btn btn-sm btn-primary"><i class="fas fa-user-cog"></i></button>
        </div>
      </div>
      <div class="card-body">
        <?php require 'listreport.php'; ?>
      </div>        

    </div>
  </div>
</div>


<div id="modal_delete" class="modal fade ">
  <?php require 'formdelete.php'; ?>
</div>
<div id="modal_upload" class="modal fade ">
  <?php require 'formupload.php'; ?>
</div>
<div id="addkaryawan" class="modal fade ">       
  <?php require 'formaddkaryawan.php'; ?>  
</div>
<div id="editkaryawan" class="modal fade ">       
  <?php require 'formeditkaryawan.php'; ?>          
</div>
<div id="addmodel" class="modal fade ">       
  <?php require 'formaddmodel.php'; ?>  
</div>
<div id="addcustomer" class="modal fade ">       
  <?php require 'formaddcustomer.php'; ?>  
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>

<script type="text/javascript">
// Fungsi Button Delete File
$(document).on("click","#btndelete",function() {
  var file = $(this).val();
  file_for = file.split(":").pop();
  file = file.split(":").shift();
  $('input#file').val(file);
  $('input#file_for').val(file_for);
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  //Form Delete
  $('#npk').keyup(function(){
    var npkdata = $('#npk').val(); 
    $.ajax({ 
      type: "POST",      
      url: "karyawan.php", 
      data: { npk: npkdata} 
    })
    .done(function( hasilajax ) { 
      var obj = JSON.parse(hasilajax);
        $('#nama').val(obj.nama);
        $('#departemen').val(obj.dept); 
    });
  })


  //Form Upload
  $('#npk1').keyup(function(){ 
    var npkdata = $('#npk1').val(); 
    $.ajax({ 
      type: "POST",      
      url: "karyawan.php",
      data: { npk: npkdata}
    })
    .done(function( hasilajax ) {
      var obj = JSON.parse(hasilajax);
        $('#nama1').val(obj.nama);
        $('#departemen1').val(obj.dept); 
    });
  })

  //table report
  $('#modelshow').change(function(){
    var model = $(this).val();
    $.ajax({
      type: "POST",      
      url: "reportmodel.php",
      data: { model: model}
    })
      .done(function( hasilajax ) {
          $('#report_tabel').html(hasilajax);
      });
   })
});
$(function() { 
  $("input[name='npk'], input[name='editnpk'], input[name='newnpk']").on('input', function(e) { 
    $(this).val($(this).val().replace(/[^0-9]/g, '')); 
  }); 
});

$('#btnhome').on('click', function(){
    $(this).addClass('active');
    $('#btnsetting').removeClass('active');
    window.location.href='index.php';
  });

  $('#btnsetting').on('click', function(){
    $(this).addClass('active');
    $('#btnhome').removeClass('active');
    $('.card-body').load('listsetting.php');
  });

function addkaryawan(){
  $('#addkaryawan').modal('show');
}
function editkaryawan(m,n){
  $('#editkaryawan').modal('show');
  $('#editnpk').val(m);
  $('#editnama').val(n);
  $.ajax({
    type: "POST",      
    url: "karyawan.php", 
    data: { npk: m}
  })
    .done(function( hasilajax ) {
      var obj = JSON.parse(hasilajax);
        $('#editdepartemen').val(obj.dept); 
    });
}
function deletekaryawan(m,n){
  var form = 'deletekaryawan';
  if (confirm('Delete Data with NPK ='+m+' ?')){
    $.ajax({
    type: "POST",      
    url : "formpost.php",
    data: { npk: m, nama: n, form: form },
  }).done(function(){
    alert('Deleted Successfully !');
    window.location.href='index.php';
  })
  };
}

function addmodel(){
  $('#addmodel').modal('show');
}
function deletemodel(n){
  var form = 'deletemodel';
  if (confirm('Delete Model '+n+' ?')){
    $.ajax({
    type: "POST",      
    url : "formpost.php",
    data: {model: n, form: form },
  }).done(function(){
    alert('Deleted Successfully !');
    window.location.href='index.php';
  })
  };
}

function addcustomer(){
  $('#addcustomer').modal('show');
}
function deletecustomer(n){
  var form = 'deletecustomer';
  if (confirm('Delete Customer '+n+' ?')){
    $.ajax({
    type: "POST",      
    url : "formpost.php",
    data: {customer: n, form: form },
  }).done(function(){
    alert('Deleted Successfully !');
    window.location.href='index.php';
  })
  };
}
//New Karyawan Password Confirmation
$('#newpass, #newpass1, #editpass, #editpass1').on('keyup', function () {
  var pass = $('#newpass').val();
  var pass1= $('#newpass1').val();
  var edpass = $('#editpass').val();
  var edpass1= $('#editpass1').val();
  if (pass.length != 8) {
    $('#message').html('Please fill Out 8 digit password !').css('color', 'red');
  } else {
    if (pass == pass1) {
      $('#message').html('Password Match').css('color', 'green');
    } else {
      $('#message').html('Password Not Match').css('color', 'red');
    }
  }

  if (edpass.length != 8) {
    $('#message1').html('Please fill Out 8 digit password !').css('color', 'red');
  } else {
    if (edpass == edpass1) {
      $('#message1').html('Password Match').css('color', 'green');
    } else {
      $('#message1').html('Password Not Match').css('color', 'red');
    }
  }
  });
</script>
</body>
</html>