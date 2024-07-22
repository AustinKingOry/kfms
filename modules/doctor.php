<?php
include('../includes/auth.php');
checkLogin();
include('../includes/db.php');
include('../templates/header.php');

$doctors = $conn->query("SELECT * FROM doctors");

echo '<h2 class="w-full text-3xl font-bold py-3 px-4 text-primary-600 dark:text-primary-400">Nearby Veterinarians</h2>';
echo "<ul>";
while ($d = $doctors->fetch_assoc()) {
    echo "<li>" . $d['name'] . " - " . $d['contact'] . " (" . $d['location'] . ")</li>";
}
echo "</ul>";

include('../templates/footer.php');
?>
