<?php
include('../includes/auth.php');
checkLogin();
include('../includes/db.php');
include('../templates/header.php');

if (isset($_POST['add_event'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO calendar (user_id, event_name, event_date) VALUES ('$user_id', '$event_name', '$event_date')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Event added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$events = $conn->query("SELECT * FROM calendar WHERE user_id=" . $_SESSION['user']['id']);
?>

<h2 class="w-full text-3xl font-bold py-3 px-4">Calendar</h2>
<form method="post" action="calendar.php" class="max-w-4xl ml-4 mt-2">
    <input type="text" name="event_name" placeholder="Event Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required>
    <input type="date" name="event_date" placeholder="Event Date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required>
    <button type="submit" name="add_event" class="text-white bg-green-700 w-fit hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Event</button>
</form>

<h3 class="w-full text-2xl font-bold py-3 px-4">Your Events</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Event Name</th>
            <th>Event Date</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($event = $events->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $event['event_name']; ?></td>
                <td><?php echo $event['event_date']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include('../templates/footer.php'); ?>
