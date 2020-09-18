<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script>
   $('#tambah_tagihan').ready(function(){
   $('#no_meteran').change(function(){
    var no_meteran = $(this).val();
    console.log(no_meteran);
    $.ajax({
     url:'<?php echo base_url('c_admin/data_tagihan/get_meteran')?>',
     method: 'post',
     data: {
       no_meteran : no_meteran
     },
     dataType: 'json',
     success: function(response){
       var len = response.length;
       console.log(len);
      //  $('#nominal, #volume').text('');
      if(len > 0){
        // Read values
        var nominal = response[0].nominal;
        var volume = response[0].volume;
        
        console.log(nominal);
        console.log(volume);
        $('#nominal').val(nominal);
        $('#volume').val(volume);
      }
     }
   });
  });
});
</script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

</body>
 
</html>