<?php include('includes/db.php'); ?>
<?php include('templates/header.php'); ?>

<main class="mx-auto w-fit">
    <h2 class="text-2xl font-bold">Login</h2>
    <form method="post" class="max-w-sm mt-4 py-5 w-96" action="login.php">
        <div class="!mb-5">
            <input type="email" name="email" placeholder="Email" class="shadow-sm bg-gray-50 border !border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-green-500 focus:!border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:!border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:!ring-green-500 dark:focus:!border-green-500 dark:shadow-sm-light" required>
        </div>
        <div class="!mb-5">
            <input type="password" name="password" placeholder="Password" class="shadow-sm bg-gray-50 border !border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-green-500 focus:!border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:!border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:!ring-green-500 dark:focus:!border-green-500 dark:shadow-sm-light" required>
        </div>
        <div class="!mb-5">
            <button type="submit" name="login" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Login</button>
        </div>
        <div class="w-full flex flex-col items-center gap-2 justify-start">
            <p class="text-sm text-gray-500">or</p>
            <a href="register.php" class="text-base text-lowercase text-green-800 font-medium">Register</a>
        </div>
    </form>
</main>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: dashboard.php');
        } else {
            echo "<div class='alert alert-danger'>Invalid password</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>No user found with that email</div>";
    }
}
?>

<?php include('templates/footer.php'); ?>
