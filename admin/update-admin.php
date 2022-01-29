<?php include 'partials/menu.php' ?>
<div class="main-content">
  <div class="wrapper">
      <h1>Upadate Admin</h1>
      <?php
      //1. Get the ID of Selected Admin
           $id=$_GET['id'];
      //2. Get the sql Query
            $sql="SELECT * from tbl_admin where id=$id";
      //3. Execute the Query
            $res=mysqli_query($conn,$sql);
            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }



       ?>
       <form action="" method="POST">

             <table class="tbl-30">
                 <tr>
                     <td>Full Name: </td>
                     <td>
                         <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                     </td>
                 </tr>

                 <tr>
                     <td>Username: </td>
                     <td>
                         <input type="text" name="username" value="<?php echo $username; ?>">
                     </td>
                 </tr>

                 <tr>
                     <td colspan="2">
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                     </td>
                 </tr>

             </table>

         </form>

      </form>
  </div>
</div>
<?php include 'partials/footer.php' ?>
