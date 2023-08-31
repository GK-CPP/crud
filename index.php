<?php
include 'db.php';

$sql = "select * from student join studentclass where student.sclass= studentclass.cid";
$result = $conn->query($sql);

//echo "<pre>";
$data = $result->fetch_all(MYSQLI_ASSOC);
//print_r($data[0]['sid']);
//die;


// return as api response josn
// echo json_encode($data);
// die;
include 'header.php';

?>

<div id="main-content">
    <h2>All Records</h2>

    <?php if (count($data) > 0) {
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
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?= $row['sid']; ?></td>
                        <td><?= $row['sname']; ?></td>
                        <td> <?= $row['address']; ?></td>
                        <td><?= $row['cname']; ?></td>
                        <td><?= $row['sphone']; ?></td>
                        <td>
                            <a href='edit.php?id=<?= $row['sid']; ?>'>Edit</a>
                            <a href='delete-inline.php'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
    } else {
        echo '<h2>No Record Found </h2>';
    }
    $conn->close();
    ?>
</div>
</div>
</body>

</html>