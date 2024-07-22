<?php
include('includes/auth.php');
checkLogin();
include('includes/db.php');
include('templates/header.php');

$user = $_SESSION['user'];
$market_data = '{"prices": [{"commodity": "Maize", "price": "30 KES/kg"}, {"commodity": "Beans", "price": "80 KES/kg"}, {"commodity": "Wheat", "price": "45 KES/kg"}]}';
$market = json_decode($market_data, true);
?>
    <?php include('templates/sidebar.php'); ?>
<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <main class="p-4 md:ml-64 h-auto pt-20">
		<div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 max-h-96 mb-4 py-4 px-3">
			<div class="border-2 border border-gray-300 flex flex-row gap-2 rounded-lg p-3 dark:border-gray-600 w-fit h-32">
				<div class="bg-gray-100 w-24 h-24 min-[480px]:h-unset rounded-md mx-auto">
                
				</div>
				<div class="w-40 flex flex-col items-start justify-start gap-2">
					<h1 class="font-semibold text-lg">Welcome, <?php echo "".$user['name'] ?></h1>
					<p>Role: <?php echo "".$user['role'] ?></p>
				</div>
			</div>
		</div>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
			<?php if ($user['role'] == 'farmer') { ?>
			<!-- // Farmer functionalities -->
			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/tea.jpg')] bg-gray-700 bg-blend-multiply">
				<a class='btn btn-success' href='modules/crops.php'>Manage Crops</a><br><br>
			</div>
			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/goats.jpg')] bg-gray-700 bg-blend-multiply">
				<a class='btn btn-success' href='modules/livestock.php'>Manage Livestock</a><br><br>
			</div>
			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/background1.jpg')] bg-gray-700 bg-blend-multiply">
				<a class='btn btn-success' href='modules/resources.php'>Manage Resources</a><br><br>
			</div>
			<?php } elseif ($user['role'] == 'officer') { ?>
			<!-- // Officer functionalities -->
			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/background1.jpg')] bg-gray-700 bg-blend-multiply">
				<a class='btn btn-success' href='modules/reports.php'>View Reports</a><br><br>
			</div>
			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/background1.jpg')] bg-gray-700 bg-blend-multiply">
				<a class='btn btn-success' href='modules/market.php'>Market Prices</a><br><br>
			</div>
			<?php } elseif ($user['role'] == 'admin') { ?>
				<!-- // Admin functionalities -->
			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/background.jpg')] bg-gray-700 bg-blend-multiply">
				<a class='btn btn-success' href='manage_users.php'>Manage Users</a><br><br>
			</div>
			<?php }?>

			<div class="flex items-center justify-center border-2 border-dashed border-gray-300 grid-cols-2 rounded-lg p-3 dark:border-gray-600 h-32 md:h-64 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/weather.gif')] bg-gray-700 bg-blend-multiply">
				<a class="btn btn-info" href="modules/weather.php">Weather and Market Info</a>
			</div>
		</div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 max-h-96 mb-4 py-4 px-3">
            <h3 class="w-full text-2xl font-bold py-3 px-4">Market Prices</h3>
            <div class="relative overflow-x-auto">
                <table class="w-full max-w-4xl text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Commodity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($market['prices'] as $item) { ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-2.5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $item['commodity'];?>
                            </th>
                            <td class="px-6 py-2.5">
                                <?php echo $item['price'];?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
<?php include('templates/footer.php'); ?>
