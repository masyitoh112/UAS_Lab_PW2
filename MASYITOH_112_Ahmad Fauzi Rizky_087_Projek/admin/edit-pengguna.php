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
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class=input-control
                            value="<?= $p->nama ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" placeholder="Username" class=input-control
                            value="<?= $p->username ?>" required>
                    </div>
                    <div class=" form-group">
                        <label>level</label>
                        <select name="level" class="input-control" required>
                            <option value="">pilih</option>
                            <option value="Super Admin" <?=($p->level == 'Super Admin') ? 'selected' : ''; ?>>Super Admin
                            </option>
                            <option value="Admin" <?=($p->level == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <button type="button" class="btn" onclick="window.location = 'pengguna.php'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-green">
                </form> <?php
                if (isset($_POST['submit'])) {

                    $nama = $_POST['nama'];
                    $user = $_POST['user'];
                    $level = $_POST['level'];
                    $currDate = date('Y-m-d H:i:s');
                    $cek = mysqli_query($con, "SELECT username FROM pengguna WHERE username = '" . $user . "' ");
                    if (mysqli_num_rows($cek) > 0) {
                        echo '<div class="alert-error">Username sudah digunakan</div>';
                    } else {
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
                }
                ?>
            </div>
        </div>
    </div>
</div> <?php include 'footer.php' ?>