<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection Failed');
    $sql = "select * from student join studentclass where student.sclass= studentclass.cid";
    $result = mysqli_query($conn, $sql) or die('Query Failed.');

    if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         echo $row['sid'] . ' ' . $row['sname'] . ' ' . $row['saddress'] . ' ' . $row['sclass'] . ' ' . $row['sphone'] . '<br>';
        //     }
        // }


    ?>

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
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['sid']; ?></td>
                        <td><?= $row['sname']; ?></td>
                        <td> <?= $row['address']; ?></td>
                        <td><?= $row['cname']; ?></td>
                        <td><?= $row['sphone']; ?></td>
                        <td>
                            <a href='edit.php'>Edit</a>
                            <a href='delete-inline.php'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo '<h2>No Record Found </h2>';
    }
    mysqli_close($conn);
    ?>
</div>
</div>
</body>

</html>