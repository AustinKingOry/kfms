<?php include('includes/db.php'); ?>
<?php include('templates/header.php'); ?>

<main class="mx-auto w-fit">
    <h2 class="text-2xl font-bold">Register</h2>
    <form method="post" action="register.php" class="max-w-2xl w-1/2 mt-4 pt-5 min-w-96">
        <div class="!mb-5">
            <input type="text" name="name" placeholder="Name" class="shadow-sm bg-gray-50 border !border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-green-500 focus:!border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:!border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:!ring-green-500 dark:focus:!border-green-500 dark:shadow-sm-light" required>
        </div>
        <div class="!mb-5">
            <input type="email" name="email" placeholder="Email" class="shadow-sm bg-gray-50 border !border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-green-500 focus:!border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:!border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:!ring-green-500 dark:focus:!border-green-500 dark:shadow-sm-light" required>
        </div>
        <div class="!mb-5">
            <input type="password" name="password" placeholder="Password" class="shadow-sm bg-gray-50 border !border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-green-500 focus:!border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:!border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:!ring-green-500 dark:focus:!border-green-500 dark:shadow-sm-light" required>
        </div>
        <div class="!mb-5">
            <select name="role" class="shadow-sm bg-gray-50 border !border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-green-500 focus:!border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:!border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:!ring-green-500 dark:focus:!border-green-500 dark:shadow-sm-light">
                <option value="farmer">Farmer</option>
                <option value="officer">Officer</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="!mb-5">
            <button type="submit" name="register" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Register</button>
        </div>
        <div class="w-full flex flex-col items-center gap-2 justify-start">
            <p class="text-sm text-gray-500">Already a member?</p>
            <a href="login.php" class="text-base text-lowercase text-green-800 font-medium">Login</a>
        </div>
    </form>
</main>

<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Registration successful</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<?php include('templates/footer.php'); ?>
