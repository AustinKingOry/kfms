<?php
include('../includes/auth.php');
checkLogin();
checkRole('officer');
include('../includes/db.php');
include('../templates/header.php');

$reports = $conn->query("SELECT * FROM reports");

?>

<main class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-bold text-primary-600 dark:text-primary-400 mb-6">Generated Reports</h2>
    
    <?php if ($reports->num_rows > 0): ?>
        <ul class="list-disc pl-6">
            <?php while ($report = $reports->fetch_assoc()): ?>
                <li class="py-2">
                    <span class="font-semibold text-gray-700"><?php echo htmlspecialchars($report['type']); ?></span> 
                    <span class="text-gray-500">- <?php echo htmlspecialchars($report['generation_date']); ?></span>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p class="text-gray-600">There are no reports to view.</p>
    <?php endif; ?>
</main>

<?php include('../templates/footer.php'); ?>
