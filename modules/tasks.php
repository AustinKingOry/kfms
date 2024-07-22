<?php
include('../includes/auth.php');
checkLogin();
include('../includes/db.php');
include('../templates/header.php');

if (isset($_POST['add_task'])) {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO tasks (user_id, task_name, description, due_date, status) VALUES ('$user_id', '$task_name', '$description', '$due_date', 'pending')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Task added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

$tasks = $conn->query("SELECT * FROM tasks WHERE user_id=" . $_SESSION['user']['id']);
?>

<h2 class="w-full text-3xl font-bold py-3 px-4">Manage Tasks</h2>
<form method="post" action="tasks.php" class="max-w-4xl ml-4 mt-2">
    <input type="text" name="task_name" placeholder="Task Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required>
    <textarea name="description" placeholder="Description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required></textarea>
    <input type="date" name="due_date" placeholder="Due Date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-2" required>
    <button type="submit" name="add_task" class="text-white bg-green-700 w-fit hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Task</button>
</form>

<h3 class="w-full text-2xl font-bold py-3 px-4">Your Tasks</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($task = $tasks->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $task['task_name']; ?></td>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $task['due_date']; ?></td>
                <td><?php echo $task['status']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include('../templates/footer.php'); ?>
