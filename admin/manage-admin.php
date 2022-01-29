<?php include 'partials/menu.php' ?>
    <!Main Contain Starts>
    <div class="main-content">
      <div class="wrapper">
          <h1>Manage Admin</h1>
          <br />
          <?php
          if (isset($_SESSION['add'])){
            echo $_SESSION['add'];//displaying session message;
            unset ($_SESSION['add']);//removing session message;
          }
          if (isset($_SESSION['delete'])){
            echo $_SESSION['delete'];//displaying session message;
            unset ($_SESSION['delete']);//removing session message;
          }
          ?>
          <br/> <br/>
          <! Button to add admin>
          <a class='btn-primary' href="add-admin.php">Add Admin</a>

          <br /> <br />
      <table class="table">
        <tr>
          <th>S.N</th>
          <th>Full Name</th>
          <th>User Name</th>
          <th>Action</th>
        </tr>
        <?php
        //Query to Get all Admin
            $sql = "SELECT * FROM tbl_admin";
            //Execute the Query
            $res = mysqli_query($conn, $sql);;
            //CHeck whether the Query is Executed of Not
        if($res==TRUE){
          $count=mysqli_num_rows($res); // Function to get all the rows in database
          $sn=1; // admin serial number
         //check the number of rows
          if($count>0){
            //we have in database
            while($rows=mysqli_fetch_assoc($res)){
              //Using While loop to get all the data from database.
              //And while loop will run as long as we have data in database

              //Get individual DAta
              $id=$rows['id'];
              $fullname=$rows['full_name'];
              $username=$rows['username'];
               //Display the Values in our Table ?>

              <tr>
              <td><?php echo $sn++ ?></td>
              <td><?php echo $fullname ?></td>
              <td><?php echo $username ?></td>
              <td><a class="btn-secondary" href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id ?>">Update Admin</a>
                  <a class="btn-danger" href="<?php echo SITEURL ?>admin/delete-admin.php?id=<?php echo $id ?>">Delete Admin</a>
              </td>
              </tr>
            <?php
            }
          }
        }

         ?>

      </table>
      </div>
    </div>

  <?php include 'partials/footer.php' ?>
