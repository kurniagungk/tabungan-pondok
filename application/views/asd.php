
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/jquery/jquery-3.3.1.js"></script>
    <script  type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/datatables.min.js"></script>
    <script  type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/dataTables.buttons.min.js"></script>
    <script  type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/buttons.html5.min.js"></script>  
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/popper/popper.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<form method="post" id="user_form">
      <label>REKENING</label>  
                          <input type="text"  name="REKENING" id="REKENING" readonly="" class="form-control"   />  
                          <br /> 
                          <button type="button" id="add_button" class="btn btn-primary">Tambah Nasabah</button>  
                          <label>NAMA</label>  
                          <input type="text" name="NAMA" id="NAMA" class="form-control" />
                          <br />  
                          <label>ALAMAT</label>  
                          <input type="text" name="ALAMAT" id="ALAMAT" class="form-control" />
                          <br />  
                          <label>SALDO</label>  
                          <input type="number" name="SALDO" id="SALDO" class="form-control" />
                          <br />  
                          <label>PASSWORD</label>  
                          <input type="password" name="PASWORD" id="PASWORD" class="form-control" value="1234" />  
                          <br />  
                          <label>Select User Image</label>  
                          <input type="file" name="user_image" id="user_image" />
                          <span id="user_uploaded_image"></span>
                          
                          <input type="hidden" id="action" name="action" class="btn btn-success" value="Add" />
                          <input type="submit"  name="action" class="btn btn-success" value="Add" />   





    </from>
</body>
<script type="text/javascript" language="javascript" >
   $(document).ready(function(){ 
    $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();
                                 $.get("<?php echo base_url() . 'Datansb/idnsb'?>", function(data, status){
                          $('#REKENING').val(data);
                            });   
           var REKENING = $('#REKENING').val();
           var ADD = $('#ADD').val();  
           var NAMA = $('#NAMA').val();
           var ALAMAT = $('#ALAMAT').val();
           var SALDO = $('#SALDO').val();  
           var extension = $('#user_image').val().split('.').pop().toLowerCase();  
           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
           if(extension != '')  
           {  
                alert("Invalid Image File");  
                $('#user_image').val('');  
                return false;  
           }  
           if(REKENING != '' && NAMA != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'Datansb/user_action'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          alert(data); 
                          $('#user_form')[0].reset();  
                          $('#myModal').modal('hide').removeData();  
                          dataTable.ajax.reload();
                          
                     }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           }
 
      });


$('#add_button').click(function(){  

           $.get("<?php echo base_url() . 'Datansb/idnsb'?>", function(data, status){
                          $('#REKENING').val(data);
                            });  
      });




      });






</script>
</html>