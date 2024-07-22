<?php
function displayMessage($message, $type = 'success') {
    echo "<div class='alert alert-$type'>$message</div>";
}
?>
