<?php include 'header.php' ?> <!-- content --> <?php
    $pengguna = mysqli_query($con, "SELECT * FROM pengguna WHERE id = '" . $_GET['id'] . "' ");
    $p = mysqli_fetch_object($pengguna);
    ?> <div class="content">
    <div class="container">
        <div class="box">
            <div class="box-header"> Edit Pengguna </div>
            <div class="box-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Ubah Password</label>
                        <input type="text" name="pass1" placeholder="Password" class=input-control
                            value="<?= $p->nama ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <input type="text" name="pass2" placeholder="" class=input-control value="??= $p-?username ??"
                            value="<?= $p->username ?>" required>
                    </div>
                    <button type="button" class="btn" onclick="window.location = 'pengguna.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                </form> <?php
                if (isset($_POST['submit'])) {

                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];
                    $currDate = date('Y-m-d H:i:s');

                    $update = mysqli_query($con, "UPDATE pengguna SET 
                    nama = '" . $nama . "', 
                    username = '" . $user . "', 
                    level = '" . $level . "', 
                    updated_at = '" . $currDate . "'
                    WHERE id = '" . $_GET['id'] . "'
                    ");

                    if ($update) {
                        echo '<div class="alert-success">Edit Data Berhasil</div>';
                    } else {
                        echo 'Gagal Edit' . mysqli_error($con);
                    }

                }
                ?>
            </div>
        </div>
    </div>
</div> <?php include 'footer.php' ?>