<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php

    $conn = mysqli_connect("localhost", "admin", "becode", "crud") or die("Connection Failed");

    // we use GET to get from url the id named class in variable
    $stu_id = $_GET['id'];
    // so this means we are asking data from this sql command
    $sql = "SELECT * FROM crud.student  WHERE sid = {$stu_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if (mysqli_num_rows($result) > 0){
        // Data from $stu_id will pass n result and then in row variable and display .
        while ($row =mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>"/>
          <input type="text" name="sname" value="<?php echo $row['sname']; ?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <?php
          // new variables
          $sql1 = "SELECT * FROM crud.studentclass";
          $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

          if (mysqli_num_rows($result1) > 0) {
              echo '<select name="sclass">';
              while ($row1 = mysqli_fetch_assoc($result1)) {
              // to fetch the class name of the student,which is assigned
                  if($row['sclass'] == $row1['cid']) // we are match it with student class
                  {
                      $select = 'selected'; // put this variable in option,
                  }
                  else
                  {
                      $select = ''; //otherwise leave it empty
                  }
                  echo "<option {$select} value='{$row1['cid']}'>{$row1['cname']}</option>";
              } // for while loop
              echo '</select>';
              }// for if statement
          ?>

      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $row['sphone']; ?>"/>
      </div>

      <input class="submit" type="submit" value="Update"/>
    </form>
        <?php
            // } for while loop
    }
        // } for if statement
    }
    ?>

</div>
</div>
</body>
</html>
