<?php
include('../includes/auth.php');
checkLogin();
include('../includes/db.php');
include('../templates/header.php');

$manure = $conn->query("SELECT * FROM manure");

echo '<h2 class="w-full text-3xl font-bold py-3 px-4 text-primary-600 dark:text-primary-400">Manure Recommendations</h2>';
echo "<ul>";
while ($m = $manure->fetch_assoc()) {
    echo "<li>" . $m['crop'] . ": " . $m['manure_type'] . "</li>";
}
echo "</ul>";

include('../templates/footer.php');
?>
