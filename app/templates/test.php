<?php include 'includes/header.php' ?>
HELLO
<?php echo $data['test'] ?>
<?php echo $data['test2'] ?>
<?php foreach($data['users'] as $user) {?>
<div><h1><?php echo $user['users']; ?></h1></div>
</body>
<?php } ?>

<?php include 'includes/footer.php' ?>
