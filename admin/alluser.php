
<?php include_once('function.php');
	  $ob->needLogged();
	  $ob->getheader();
	 
	 ?>
        <!-- page content -->
        <div class="right_col" role="main">
		
		
		
	  <?php 
  
   $jsonString = file_get_contents('../user.json');
   $data = json_decode($jsonString, true);
   
  
  ?>
  
 <!-- page content -->
        <div class="" role="main">
              <div class="col-md-12  col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
					  
                        <tr>
                          <th>Sirial Number</th>
                          <th>Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					<?php 
					
					   foreach ($data as $innerArray) {
						//  Check type
						if (is_array($innerArray)){
							//  Scan through inner loop
							foreach ($innerArray as $value) { ?>
								
								<tr>
                          <th scope="row">1</th>
                          <td><?php echo $value['name'];?></td>
                          <td><?php echo $value['username'];?></td>
                          <td><?php echo $value['email'];?></td>
                      
                        </tr>
								
						<?php	}
						}
					}
					
					?>
                        
                       
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
          </div>
        <!-- /page content -->
		
		
		
		
           </div>
        <!-- /page content -->
		
		
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            All Right Reserved</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
  <?php  $ob->getfooter(); ?>