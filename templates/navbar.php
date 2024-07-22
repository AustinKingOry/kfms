<?php 
$ROOT = '/kfms/';
?>
<nav class="navbar navbar-expand-lg navbar-light z-[41]">
  <a class="navbar-brand font-bold text-2xl" href="<?php echo $ROOT.'index.php'; ?>">KFMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'index.php'; ?>">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'templates/about.php'; ?>">About Us</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'templates/contact.php'; ?>">Contact</a></li>
      <?php if (isset($_SESSION['user'])): ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'dashboard.php'; ?>">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'notification.php'; ?>">Notifications</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'logout.php'; ?>">Logout</a></li>
      <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'login.php'; ?>">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $ROOT.'register.php'; ?>">Register</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
