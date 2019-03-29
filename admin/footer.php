    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
	
  <script>
  
    $('#save').click(function(e) {
		e.preventDefault()
    var data = $("#form").serialize();
	  $.ajax({
			 data: data,
			 type: "post",
			 url: "insert.php",
			 success: function(data){
			   alert("Data Save: " + data);
				  document.getElementById("form").reset();
			  
			 }
		});

 });
  
  </script>
  
    <script>
    $('.edit').click(function(){
        var id=$(this).attr('id');
        var url='{{route("adminmenu.edit",":id")}}';
        var url = url.replace(':id', id);
        var url2='{{route("adminmenu.update",":id")}}';
        var url2 = url2.replace(':id', id);
        // edit
         $.ajax({
            url:url,
            type:'GET',
            dataType:'json',
            success:function(data){
               $('#edit_pcat').val(data.title);
               $('#menulink').val(data.link);
               $('#display1').val(data.display);
               if(data.type==1){
                $('#megamenu').attr("checked", "checked");

              }else{
                    $('#megamenu').removeAttr("checked", "checked");
              }

               $('#psubmitform1').attr('action',url2);
            }

        });
      });
  </script>
	
	
</body>
</html>






