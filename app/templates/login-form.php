<?php include 'includes/header.php' ?>

    <div>
        <?php if(isset($data['message'])) {?>
            <span class="message"><?php echo $data['message']; ?></span>
        <?php } ?>

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

<?php include 'includes/footer.php' ?>