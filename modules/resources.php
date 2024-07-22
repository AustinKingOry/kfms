<?php
include('../includes/auth.php');
checkLogin();
checkRole('farmer');
include('../includes/db.php');
include('../templates/header.php');

if (isset($_POST['add_resource'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO resources (name, type, quantity) VALUES ('$name', '$type', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Resource added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$resources = $conn->query("SELECT * FROM resources");
?>

<h2 class="w-full text-3xl font-bold py-3 px-4">Manage Resources</h2>
<form method="post" action="resources.php" class="max-w-4xl ml-4 mt-2">
    <input type="text" name="name" placeholder="Resource Name" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <input type="text" name="type" placeholder="Resource Type" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <input type="number" name="quantity" placeholder="Quantity" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <button type="submit" name="add_resource" class="text-white w-fit bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Resource</button>
</form>

<h3 class="w-full text-2xl font-bold py-3 px-4">Resources Inventory</h3>
<div class="row w-full border !border-gray-200 rounded-md mx-auto py-3">
    <?php while ($resource = $resources->fetch_assoc()) { ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $resource['name']; ?></h5>
                    <p class="card-text">Type: <?php echo $resource['type']; ?></p>
                    <p class="card-text">Quantity: <?php echo $resource['quantity']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include('../templates/footer.php'); ?>
