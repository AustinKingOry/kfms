<?php 
$ASSETS = $_SERVER['DOCUMENT_ROOT'].'/kfms/templates/';
include($ASSETS.'header.php');

?>
<main class="main py-6 bg-center bg-no-repeat bg-cover bg-[url('<?php echo $ROOT; ?>/assets/images/contact.jpg')] bg-gray-700 bg-blend-multiply">
    <h2 class="w-full text-3xl font-bold py-3 px-4">Contact Us</h2>
    <p class="mb-8 text-lg font-normal p-4 text-gray-200 lg:text-xl">If you have any questions or need assistance, feel free to reach out to us through the following channels:</p>
    <ul class="p-4">
        <li class="text-gray-200">Email: support@kfmssystem.com</li>
        <li class="text-gray-200">Phone: +254 700 000 000</li>
        <li class="text-gray-200">Address: Kisii County Headquarters, Kisii, Kenya</li>
    </ul>
</main>
<?php include($ASSETS.'footer.php'); ?>
