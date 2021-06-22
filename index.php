<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    include 'config.php';
    // query we'll use this var in our function mysql_query

    // JOIN :- to get data from connect 2 or more tables,
    // where we joining the two table to join from
    // sclass and sid from 2nd table are connected,
    $sql = "SELECT * FROM crud.student JOIN crud.studentclass WHERE student.sclass = studentclass.cid";

    // requires 2 variable (connection , and query name)
    //$result i need to show it in table and to show it make a variable
    $result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

    // it will check how many data we received from database
    // it came from variable $result
    // if only one row came (single record even) the > 0
    if (mysqli_num_rows($result)> 0){

    ?>
<!--  to show data in this table m need a condition to know if a data came here or not-->
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
<!--        to start the loop for all the row-->
<?php
        // this will show in $row, ASSOC array : $result has become array because multiple data so now its a assoc data
while ($row = mysqli_fetch_assoc($result)){
?>
            <tr>
<!--                now we need to put column name now inside td tag.-->
<!--                 whenever assoc array print then [] and inside name of the key-->
                <td><?php echo $row['sid'] ?></td>
                <td><?php echo $row['sname'] ?></td>
                <td><?php echo $row['saddress'] ?></td>
<!-- now the join id name is cname to show from studentclass name-->
                <td><?php echo $row['cname'] ?></td>
                <td><?php echo $row['sphone'] ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['sid']; ?>'>Delete</a>
                </td>
            </tr>
    <!--        closed the {} of if(mysqli_fetch_assoc($result)){-->
<?php  } ?>
        </tbody>
    </table>
<!--        closed the {} of if (mysqli_num_rows($result)> 0){-->
    <?php
    }
    else
    {
   // in case no single record is found we make a else statement
        echo "<h2>No Record Found </h2>";
    }
    // to close the connection we use this function
    mysqli_close($conn);
    ?>
</div>
</div>
</body>
</html>
