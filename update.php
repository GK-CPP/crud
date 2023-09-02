<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>


    <?php if (isset($_POST['showbtn'])) {
        include 'db.php';
        $sql = "SELECT * FROM student WHERE sid={$_POST['sid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if (count($row) > 0) {

    ?>
            <form class="post-form" action="updatedata.php" method="post">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="hidden" name="sid" value=" <?= $row['sid']; ?>" />
                    <input type="text" name="sname" value=" <?= $row['sname']; ?>" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="saddress" value=" <?= $row['address']; ?>" />
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <?php
                    $sql1 = "select * from studentclass";
                    $result1 = $conn->query($sql1);

                    $data1 = $result1->fetch_all(MYSQLI_ASSOC);

                    if (count($data1) > 0) { ?>
                        <select name='sclass'>
                            <?php foreach ($data1 as $row1) {
                                if ($row1['cid'] == $row['sclass']) { ?>
                                    <option value=<?= $row1['cid'] ?> selected>
                                        <?= $row1['cname'] ?>
                                    </option>
                                <?php } else { ?>
                                    <option value=<?= $row1['cid'] ?>>
                                        <?= $row1['cname'] ?>
                                    </option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="sphone" value=" <?= $row['sphone']; ?>" />
                </div>
                <input class="submit" type="submit" value="Update" />
            </form>
    <?php }
    }
    ?>
</div>
</div>
</body>

</html>