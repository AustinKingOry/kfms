<?php
include('../includes/auth.php');
checkLogin();
checkRole('farmer');
include('../includes/db.php');
include('../templates/header.php');

if (isset($_POST['add_disease'])) {
    $crop_id = $_POST['crop_id'];
    $disease_name = $_POST['disease_name'];
    $symptoms = $_POST['symptoms'];
    $treatment = $_POST['treatment'];

    $sql = "INSERT INTO disease_pest (crop_id, disease_name, symptoms, treatment) VALUES ('$crop_id', '$disease_name', '$symptoms', '$treatment')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Disease added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$crops = $conn->query("SELECT * FROM crops WHERE farmer_id=" . $_SESSION['user']['id']);
$diseases = $conn->query("SELECT * FROM disease_pest");
?>

<h2 class="w-full text-3xl font-bold py-3 px-4">Manage Diseases and Pests</h2>
<form method="post" action="disease_pest.php" class="max-w-4xl ml-4 mt-2">
    <select name="crop_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2">
        <option value="">Select Crop</option>
        <?php while ($crop = $crops->fetch_assoc()) { ?>
            <option value="<?php echo $crop['id']; ?>"><?php echo $crop['crop_name']; ?></option>
        <?php } ?>
    </select>
    <input type="text" name="disease_name" placeholder="Disease Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required>
    <textarea name="symptoms" placeholder="Symptoms" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required></textarea>
    <textarea name="treatment" placeholder="Treatment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required></textarea>
    <button type="submit" name="add_disease" class="text-white bg-green-700 w-fit hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Disease</button>
</form>

<h3 class="w-full text-2xl font-bold py-3 px-4">Recorded Diseases and Pests</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Crop ID</th>
            <th>Disease Name</th>
            <th>Symptoms</th>
            <th>Treatment</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($disease = $diseases->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $disease['crop_id']; ?></td>
                <td><?php echo $disease['disease_name']; ?></td>
                <td><?php echo $disease['symptoms']; ?></td>
                <td><?php echo $disease['treatment']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include('../templates/footer.php'); ?>
