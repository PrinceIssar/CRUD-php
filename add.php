<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="class">
                <option value="" selected disabled>Select Class</option>

                <?php
                $conn = mysqli_connect("localhost","admin","becode","crud") or die("Connection Failed");


                $sql = "SELECT * FROM crud.studentclass";
                //This will bring fetch all the data from studentclass
                $result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

                // recode which is fetch will come in loop in option tag
                while ($row = mysqli_fetch_assoc($result)){

                ?>

<!--                  To have the id name we put in value php code  so we'll have the id and the name as well-->
                <option value="<?php echo $row['cid']; ?>"><?php echo $row['cname']; ?> </option>
                <?php
                    // {} of while loop
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
