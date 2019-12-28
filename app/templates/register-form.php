<?php include 'includes/header.php' ?>

    <div>

        <form action="/register" target="_blank" onsubmit="checkRegisterFields">
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

<?php include 'includes/footer.php' ?>