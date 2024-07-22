<?php
include('../includes/auth.php');
checkLogin();
include('../includes/db.php');
include('../templates/header.php');

$chemicals = $conn->query("SELECT * FROM chemicals");

echo "<h2>Chemicals Recommendations</h2>";
echo "<ul>";
while ($c = $chemicals->fetch_assoc()) {
    echo "<li>" . $c['crop'] . ": " . $c['chemical_type'] . "</li>";
}
echo "</ul>";

include('../templates/footer.php');
?>

