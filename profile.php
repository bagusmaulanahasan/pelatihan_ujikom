<?php
require_once "auth.php";

include "db.php";

$db = new db();

if (isset($_GET['action']) && $_GET['action'] == 'view') {
    $data = $db->get_user_by_username($_SESSION['username'])->fetch_assoc();
    ?>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Profile</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form id="formProfile">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak diubah">
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi password baru">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <?php
} elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if (!empty($password) && $password !== $confirm) {
        echo "Password tidak cocok!";
    } else {
        $update = $db->update_user($_SESSION['username'], $username, $password);
        if ($update) {
            $_SESSION['username'] = $username;
            echo "Profile berhasil diupdate!";
        } else {
            echo "Gagal update profile!";
        }
    }
}
?>