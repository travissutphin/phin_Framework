<?php
/* ROLES.CRUD_UPDATE */
/*****************************************************************/
include('../templates/admin_header.php');
include('controller.php');

?>
<?php include('../templates/admin_nav.php'); ?>
<div id="page-wrapper">
      
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Role</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
      
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo messages($message); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
   
                <fieldset>  
        
					<legend></legend>
                    <?php while ($row = $_SESSION['FETCH_ARRAY']($record_by_id)){ ?>
                        
                        <form name="manage" action="<?php echo current_page_Url(); ?>" method="post" role="form" >                    
                            
                            <div class="col-xs-4">
                            Role:<br />
                            <input name="ROLE_NAME" type="text" class="form-control" value="<?php echo $row['ROLE_NAME']; ?>" />
                            </div>

                          	<div class="col-xs-8">
                          		&nbsp;
                          	</div>

                          	<div class="col-xs-4">
                          		<button name="cancel" class="btn btn-danger btn-outline"> Cancel </button>
                          		<button name="update" class="btn btn-success btn-outline"> Save </button>
                          		<input name="ROLE_ID" type="hidden" value="<?php echo $row['ROLE_ID']; ?>" />               
                          	</div>
                        </form>
                        
                    <?php } ?>
                
                </fieldset> 
        
                    </div>
                    <!-- /.table-responsive -->
                   
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            
</div>

<?php
/*****************************************************************/
include('../templates/admin_footer.php');
?>