<?php
include('includes/auth.php');
checkLogin();
include('includes/db.php');
include('templates/header.php');

echo '<h2 class="w-full text-2xl font-bold py-3 px-4">Notifications</h2>';
echo '<p class="w-full text-base font-medium py-3 px-4 text-gray-500">Here you will receive alerts and notifications.</p>';

include('templates/footer.php');
?>
