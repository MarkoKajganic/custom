<?php include 'includes/header.php' ?>

    <div>
        <?php if(isset($data['message'])) {?>
        <span class="message"><?php echo $data['message']; ?></span>
        <?php } ?>

        <form action="/register" method="post">
            <div>
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label><b>Email</b></label>
                <input type="text" name="email">

                <label><b>Name</b></label>
                <input type="text" name="name">

                <label><b>Password</b></label>
                <input type="password" name="psw">

                <label><b>Repeat Password</b></label>
                <input type="password" name="psw-repeat">
                <hr>

                <button type="submit">Register</button>
            </div>
        </form>

    </div>

    <div>
        <span>You already have an account? Click here to <a href="/login-form">login</a>.</span>
    </div>

<?php include 'includes/footer.php' ?>