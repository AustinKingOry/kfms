<?php
include('includes/auth.php');
checkLogin();
checkRole('admin');
include('includes/db.php');
include('templates/header.php');

if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>User deleted successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$users = $conn->query("SELECT * FROM users");

echo "<h2 class='text-xl font-bold my-2'>Manage Users</h2>";
echo "<ul>";
while ($user = $users->fetch_assoc()) {
    echo "<li class='flex flex-row gap-3 my-2'><p class='min-w-64'>" . $user['name'] . " (" . $user['role'] . ") - </p><form method='post' action='manage_users.php' class='p-0' style='display:inline;'>
            <input type='hidden' name='user_id' value='" . $user['id'] . "'>
            <button type='submit' name='delete_user' class='btn btn-danger btn-sm'>Delete</button>
          </form></li>";
}
echo "</ul>";

include('templates/footer.php');
?>
