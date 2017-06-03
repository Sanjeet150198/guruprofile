
<?php 
//update pwd panel
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$old_pwd=$_POST["oldpwd"];
	$new_pwd=$_POST["newpwd"];
	$cnew_pwd=$_POST["cnewpwd"];
	if(!empty($old_pwd) && !empty($new_pwd) && !empty($cnew_pwd)){
			$msg=$obj->reset_pwd("admin",$old_pwd,$new_pwd,$cnew_pwd,$_SESSION["id"]);
		}else{
			$msg="Field should not empty";
			}

	}
?>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<script type="text/javascript" src="../assets/jquery/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<style>
#section1{padding-top:50px; width:100%; background-color:fff; float:left;}
</style>
<?php include ("header.php");?>
<!-- Page Content -->
        <div id="section1" class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile Update</h1>
                </div>
            </div>

            <div class="row">
	
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <h1>Password change</h1>
                    </div>
		    </div>
				<div class="row">
                    <div class="col-sm-6">
                    <div id="msg"></div>
                    <?php 
                    $access=$obj->fetch("admin",array("name","addr","no"),$_SESSION["id"]);
                    if(!empty($access)):
                    foreach($access as $row):?>
                    <form id="update_profile_form">
                        <div class="form-group">
                         <div class="input-group">
                   		 <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                        <input type="text" name="name" value="<?= $row->name?>" placeholder="Enter your name" class="form-control">
                        </div>
                        </div>
                        <div class="form-group">
                         <div class="input-group">
                   		  <div class="input-group-addon"><i class="fa fa-home"></i></div>
                        <input type="text" name="addr" value="<?= $row->addr?>" placeholder="Enter your address" class="form-control">
                        </div>
                        </div>
                        <!--contact no.-->
                        <div class="form-group">
                         <div class="input-group">
                   		  <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                        <input type="text" name="phone" value="<?= $row->no?>" placeholder="Enter your contact no." class="form-control">
                        </div>
                        </div>
                        <input type="hidden" name="admin_udpate">
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                        <?php endforeach;endif;?>
                    </div>
        
                    <!-- password change coading-->
                    <div class="col-sm-6">
                    <span class="err"><?=$msg?></span>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                        <div class="form-group">
                        <input type="text" name="oldpwd" placeholder="Enter Old Pwd" class="form-control">
                        </div>
                        <div class="form-group">
                        <input type="text" name="newpwd" placeholder="Enter Password" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        <input type="text" name="cnewpwd" placeholder="Confirm Password" class="form-control">
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
        
             </div>
        </div>
<!--/page content-->
<?php include ("footer.php");?>
