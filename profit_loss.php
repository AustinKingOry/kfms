<?php
include('includes/auth.php');
checkLogin();
include('includes/db.php');
include('templates/header.php');

$farmer_id = $_SESSION['user']['id'];
$profit_loss_query = $conn->query("SELECT crop_name, profit_loss FROM crops WHERE farmer_id='$farmer_id'");
$profit_loss_data = [];

while ($row = $profit_loss_query->fetch_assoc()) {
    $profit_loss_data[] = $row;
}
?>

<h2 class="w-full text-3xl font-bold py-3 px-4">Profit and Loss</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Crop Name</th>
            <th>Profit/Loss</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($profit_loss_data as $data) { ?>
            <tr>
                <td><?php echo $data['crop_name']; ?></td>
                <td><?php echo $data['profit_loss']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include('templates/footer.php'); ?>
