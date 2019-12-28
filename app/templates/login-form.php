<?php include 'includes/header.php' ?>

    <div>
        <!--   If we need to display a message to the user, we do it on the top of the page.    -->
        <?php if(isset($data['message'])) {?>
            <span class="message"><?php echo $data['message']; ?></span>
        <?php } ?>

        <!--    Basic login form.    -->
        <form action="/login" method="post">
            <div>
                <h1>Login</h1>
                <p>Please fill in this form to login with your an account.</p>
                <hr>

                <label><b>Email</b></label>
                <input type="text" name="email">

                <label><b>Password</b></label>
                <input type="password" name="psw">

                <button type="submit">Login</button>
            </div>
        </form>

    </div>

    <div>
        <span>You don't have an account? Click here to <a href="/register-form">register</a>.</span>
    </div>

<?php include 'includes/footer.php' ?>