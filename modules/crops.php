<?php
include('../includes/auth.php');
checkLogin();
checkRole('farmer');
include('../includes/db.php');
include('../templates/header.php');

// Fetch data for dropdowns
$medicines = ['Pesticides', 'Fungicides', 'Herbicides'];
$manures = ['Compost', 'Green Manure', 'Animal Manure'];
$chemicals = ['Insecticides', 'Fungicides', 'Herbicides'];

if (isset($_POST['add_crop'])) {
    $crop_name = $_POST['crop_name'];
    $growth_stage = $_POST['growth_stage'];
    $health_status = $_POST['health_status'];
    $medicine = implode(',', $_POST['medicine']);
    $manure = implode(',', $_POST['manure']);
    $chemical = implode(',', $_POST['chemical']);
    $production_amount = $_POST['production_amount'];
    $sell_amount = $_POST['sell_amount'];
    $profit_loss = $sell_amount - $production_amount;
    $crop_type = $_POST['crop_type'];
    $farmer_id = $_SESSION['user']['id'];
    $image_path = strtolower(str_replace(' ', '_', $crop_name)) . ".jpg";

    $sql = "INSERT INTO crops (farmer_id, crop_name, growth_stage, health_status, medicine, manure, chemical, production_amount, sell_amount, profit_loss, crop_type, image_path) VALUES ('$farmer_id', '$crop_name', '$growth_stage', '$health_status', '$medicine', '$manure', '$chemical', '$production_amount', '$sell_amount', '$profit_loss', '$crop_type', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Crop added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$crops = $conn->query("SELECT * FROM crops WHERE farmer_id=" . $_SESSION['user']['id']);
?>

<h2 class="w-full text-3xl font-bold py-3 px-4 text-primary-600 dark:text-primary-400">Manage Crops</h2>
<form method="post" action="crops.php" class="max-w-4xl ml-4 mt-2">
    <select name="crop_name" required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select Crop</option>
        <option value="Maize">Maize</option>
        <option value="Wheat">Wheat</option>
        <option value="Rice">Rice</option>
        <!-- Add more crops as needed -->
    </select>
    <select name="growth_stage" required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select Growth Stage</option>
        <option value="Seedling">Seedling</option>
        <option value="Vegetative">Vegetative</option>
        <option value="Flowering">Flowering</option>
        <option value="Maturity">Maturity</option>
    </select>
    <select name="health_status" required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
    <select name="manure[]" class="manure-field my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple required>
        <option value="">Select Manure</option>
        <?php foreach ($manures as $manure): ?>
            <option value="<?php echo $manure; ?>"><?php echo $manure; ?></option>
        <?php endforeach; ?>
    </select>
    <select name="chemical[]" class="chemical-field my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple required>
        <option value="">Select Chemical</option>
        <?php foreach ($chemicals as $chemical): ?>
            <option value="<?php echo $chemical; ?>"><?php echo $chemical; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="production_amount" placeholder="Production Amount" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <input type="number" name="sell_amount" placeholder="Sell Amount" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
    <select name="crop_type" required class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Select Crop Type</option>
        <option value="seedling">Seedling</option>
        <option value="mature">Mature</option>
    </select>
    <button type="submit" name="add_crop" class="w-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Crop</button>
</form>

<h3 class="w-full text-2xl font-bold py-3 px-4">Your Crops</h3>
<div class="row w-full border !border-gray-200 rounded-md mx-auto py-3">
    <?php while ($crop = $crops->fetch_assoc()) { ?>
        <div class="col-md-4 !max-w-96">
            <div class="card">
                <img src="../assets/images/<?php echo $crop['image_path']; ?>" class="card-img-top" alt="Crop">
                <div class="card-body">
                    <h5 class="card-title text-xl font-semibold"><?php echo $crop['crop_name']; ?></h5>
                    <p class="card-text">Growth Stage: <?php echo $crop['growth_stage']; ?></p>
                    <p class="card-text">Health Status: <?php echo $crop['health_status']; ?></p>
                    <p class="card-text">Medicine: <?php echo $crop['medicine']; ?></p>
                    <p class="card-text">Manure: <?php echo $crop['manure']; ?></p>
                    <p class="card-text">Chemical: <?php echo $crop['chemical']; ?></p>
                    <p class="card-text">Production Amount: <?php echo $crop['production_amount']; ?></p>
                    <p class="card-text">Sell Amount: <?php echo $crop['sell_amount']; ?></p>
                    <p class="card-text">Profit/Loss: <?php echo $crop['profit_loss']; ?></p>
                    <p class="card-text">Crop Type: <?php echo $crop['crop_type']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include('../templates/footer.php'); ?>
