<?php 
$ASSETS = $_SERVER['DOCUMENT_ROOT'].'/kfms/templates/';
include($ASSETS.'header.php');

?>
<section class="bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/background1.jpg')] bg-gray-700 bg-blend-multiply">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-green-600 dark:text-white">About Us</h2>
            <p class="mb-8 text-gray-200 sm:text-xl dark:text-gray-400">Welcome to the Kisii Farming Management System. Our mission is to provide a comprehensive and easy-to-use platform for farmers, officers, and administrators in Kisii County. Our system allows users to manage crops, livestock, resources, and market information effectively.</p>
            <p class="mb-8 text-lg font-normal text-gray-200 lg:text-xl">We aim to support the agriculture sector in Kisii County by offering advanced features and functionalities tailored to meet the unique needs of our users.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                <a href="<?php echo $ROOT.'login.php'; ?>" class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white !bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Login
                </a>
            </div>
        </div>
    </div>
</section>
<?php include($ASSETS.'footer.php'); ?>
