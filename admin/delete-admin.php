<?php
include ('../config/constants.php');
    //get the id to delete
      $id=$_GET['id'];
    //create sql query to delete data
    $sql="DELETE from tbl_admin where id=$id";
    //execute query from the database
    $res=mysqli_query($conn,$sql);

    if ($res==TRUE){
      //echo "Delete Admin Successfully";
      $_SESSION['delete']='<div class=success> Delete Admin Successfully </div>';
      header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
      echo "Failed to delete admin";
    }

 ?>
