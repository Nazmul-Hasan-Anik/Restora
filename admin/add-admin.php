<?php include 'partials/menu.php' ?>
<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <br/>
    <?php
    if (isset($_SESSION['add'])){
      echo $_SESSION['add'];//displaying session message;
      unset ($_SESSION['add']);//removing session message;
    }
    ?>

    <form action="" method="post" >
      <table class="tbl30">
        <tr>
          <td>Full Name: </td>
          <td> <input type="text" name="full_name" Placeholder="Enter your Name" required>  </td>

        </tr>
        <tr>
          <td>User Name</td>
          <td> <input type="text" name="username" Placeholder="Enter UserName" required > </td>
        </tr>
        <tr>
          <td>Password</td>
          <td> <input type="password" name="password" Placeholder="Enter your Password" required> </td>
        </tr>
        <tr>
          <td colspan="2" >
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>

  </div>

</div>
<?php include 'partials/footer.php' ?>

<?php

if (isset($_POST['submit'])) {
  //get the data from FORM
  $full_name=$_POST['full_name'];
  $username=$_POST['username'];
  $password=md5($_POST['password']);


 //SQL Query to save the data into database
  $sql="INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password' ";

//$conn = mysqli_connect('localhost','root','');
  //Execute Query and save Data in Database

  $res=mysqli_query($conn,$sql) or   die(mysqli_error($conn));
  if ($res==true){
    $_SESSION['add']='<div class=success>Admin added successfully</div>';
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else {
    $_SESSION['add']='Failed to add admin';
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
}
 ?>
