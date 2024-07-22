<?php 
$ROOT = '/kfms/';
?>
<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-10 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="<?php echo $ROOT; ?>modules/crops.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    Manage Crops
                </a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/livestock.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Manage Livestock</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/resources.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Manage Resources</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/reports.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">View Reports</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/market.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Market Prices</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/weather.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Weather Info</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/tasks.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Manage Tasks</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/calendar.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Calendar</a>
            </li>
            <!-- <li>
                <a href="<?php echo $ROOT; ?>modules/doctor.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Doc</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/manure.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Manure</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>modules/chemicals.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Chemicals</a>
            </li> -->
            <li>
                <a href="<?php echo $ROOT; ?>modules/disease_pest.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Disease and Pest Management</a>
            </li>
            <li>
                <a href="<?php echo $ROOT; ?>profit_loss.php" class="flex items-center !p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">Profit & Loss Data</a>
            </li>
        </ul>
    </div>
</aside>