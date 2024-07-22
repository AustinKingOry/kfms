<?php
include('../includes/auth.php');
checkLogin();
checkRole('farmer');
include('../includes/db.php');
include('../templates/header.php');

// Fetch data for dropdowns
$medicines = ['Antibiotics', 'Vaccines', 'Dewormers'];
$foods = ['Hay', 'Grains', 'Silage'];

if (isset($_POST['add_livestock'])) {
    $livestock_name = $_POST['livestock_name'];
    $health_status = $_POST['health_status'];
    $medicine = implode(',', $_POST['medicine']);
    $food = implode(',', $_POST['food']);
    $production_amount = $_POST['production_amount'];
    $sell_amount = $_POST['sell_amount'];
    $profit_loss = $sell_amount - $production_amount;
    $production_type = $_POST['production_type'];
    $farmer_id = $_SESSION['user']['id'];
    $image_path = strtolower(str_replace(' ', '_', $livestock_name)) . ".jpg";

    $sql = "INSERT INTO livestock (farmer_id, livestock_name, health_status, medicine, food, production_amount, sell_amount, profit_loss, production_type, image_path) VALUES ('$farmer_id', '$livestock_name', '$health_status', '$medicine', '$food', '$production_amount', '$sell_amount', '$profit_loss', '$production_type', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Livestock added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$livestock = $conn->query("SELECT * FROM livestock WHERE farmer_id=" . $_SESSION['user']['id']);
?>

<h2 class="w-full text-3xl font-bold py-3 px-4">Manage Livestock</h2>
<form method="post" action="livestock.php" class="max-w-4xl ml-4 mt-2">
    <select name="livestock_name" required required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select Livestock</option>
        <option value="Cow">Cow</option>
        <option value="Goat">Goat</option>
        <option value="Sheep">Sheep</option>
        <!-- Add more livestock as needed -->
    </select>
    <select name="health_status" required required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select Health Status</option>
        <option value="Healthy">Healthy</option>
        <option value="Diseased">Diseased</option>
    </select>
    <select name="medicine[]" class="medicine-field my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple required>
        <option value="">Select Medicine</option>
        <?php foreach ($medicines as $medicine): ?>
            <option value="<?php echo $medicine; ?>"><?php echo $medicine; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="food[]" class="food-field my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple required>
        <option value="">Select Food</option>
        <?php foreach ($foods as $food): ?>
            <option value="<?php echo $food; ?>"><?php echo $food; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="production_amount" placeholder="Production Amount" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <input type="number" name="sell_amount" placeholder="Sell Amount" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <select name="production_type" required required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select Production Type</option>
        <option value="meat">Meat</option>
        <option value="milk">Milk</option>
        <option value="eggs">Eggs</option>
        <!-- Add more production types as needed -->
    </select>
    <button type="submit" name="add_livestock" class="w-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Livestock</button>
</form>

<h3 class="w-full text-2xl font-bold py-3 px-4">Your Livestock</h3>
<div class="row w-full border !border-gray-200 rounded-md mx-auto py-3">
    <?php while ($animal = $livestock->fetch_assoc()) { ?>
        <div class="col-md-4">
            <div class="card">
                <img src="../assets/images/<?php echo $animal['image_path']; ?>" class="card-img-top" alt="Livestock">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $animal['livestock_name']; ?></h5>
                    <p class="card-text">Health Status: <?php echo $animal['health_status']; ?></p>
                    <p class="card-text">Medicine: <?php echo $animal['medicine']; ?></p>
                    <p class="card-text">Food: <?php echo $animal['food']; ?></p>
                    <p class="card-text">Production Amount: <?php echo $animal['production_amount']; ?></p>
                    <p class="card-text">Sell Amount: <?php echo $animal['sell_amount']; ?></p>
                    <p class="card-text">Profit/Loss: <?php echo $animal['profit_loss']; ?></p>
                    <p class="card-text">Production Type: <?php echo $animal['production_type']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include('../templates/footer.php'); ?>
