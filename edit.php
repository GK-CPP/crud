<?php

include 'db.php';
try {
    $sql = "SELECT * FROM student WHERE sid={$_GET['id']}";

    $result = $conn->query($sql);

    //echo "<pre>";
    // fetch single row
    $row = $result->fetch_assoc();
    //print_r($row);
    // die;
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php if (count($row) > 0) { ?>
        <form class="post-form" action="updatedata.php" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="hidden" name="sid" value="<?= $row['sid']; ?>" />
                <input type="text" name="sname" value="<?= $row['sname']; ?>" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="saddress" value="<?= $row['address']; ?>" />
            </div>
            <div class="form-group">
                <label>Class</label>

                <!-- <?php
                        $sql1 = "select * from studentclass";
                        $result1 = $conn->query($sql1);

                        $data1 = $result1->fetch_all(MYSQLI_ASSOC);

                        if (count($data1) > 0) {
                            echo "<select name='sclass'>";
                            foreach ($data1 as $row1) {
                                if ($row1['cid'] == $row['sclass']) {
                                    echo "<option value='{$row1['cid']}' selected>{$row1['cname']}</option>";
                                } else {
                                    echo "<option value='{$row1['cid']}'>{$row1['cname']}</option>";
                                }
                            }
                            echo "</select>";
                        }

                        ?> -->

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
    ?>
</div>
</div>
</body>

</html>