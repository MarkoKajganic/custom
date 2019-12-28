<!-- Header and footer included on all pages. -->
<?php include 'includes/header.php' ?>

<!-- Basic homepage links. -->
<!-- If the user is logged in, display the logout link. -->
<?php if(isset($_SESSION['user'])) { ?>
    <a href="/logout">Logout</a>
<!--  Otherwise, show the login and the register links.  -->
<?php } else { ?>
    <a href="/login-form">Login</a>
    <a href="/register-form">Register</a>
<?php } ?>
<!-- Search link is always displayed to demonstrate the redirection if clicked when not logged in. -->
<a href="/search-form">Search</a>

<!-- When the user registers/logs in, we greet him/her. -->
<?php if(isset($data['greet'])&&$data['greet'])  {?>
    <div>Welcome <?php echo $_SESSION['user']['name']; ?>!</div>
<?php } ?>

<?php include 'includes/footer.php' ?>