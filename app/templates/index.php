<?php include 'includes/header.php' ?>

<a href="/login-form">Login</a>
<a href="/register-form">Register</a>
<a href="/search-form">Search</a>

<?php if(isset($data['greet'])&&$data['greet'])  {?>
    <div>Welcome <?php echo $_SESSION['user']['name']; ?></div>
<?php } ?>

<?php include 'includes/footer.php' ?>