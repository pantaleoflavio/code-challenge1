<?php

if (isset($_POST['submit'])) {
    $sub_user = $_POST['username'];
    $sub_email = $_POST['email'];
    $sub_password = $_POST['password'];

    $query = "SELECT * FROM users WHERE user_email = '{$sub_email}'";
    $login_query = mysqli_query($connection, $query);

    if (!$login_query) {
        die("Query failed" . mysqli_error($connection));
    }

    if (mysqli_num_rows($login_query) == 0) {
        header("Location: ../index.php");
    }

    while ($row = mysqli_fetch_assoc($login_query)) {
        $user_id = $row['user_id'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $user_username = $row['username'];
        $user_role = $row['user_role'];
    }

    if ($sub_password === $user_password) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $user_username;
        $_SESSION['user_role'] = $user_role;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_password'] = $user_password;

        header("Location: index.php?u_id={$user_id}");

    } else {
        echo "<h4 class='bg-danger text-white text-center'>Password Wrong</h4>";;
    }

}

?>

<div id="login-box" class="well">
    <form action="../cms/index.php" method = "post">
        <div class="form_row user-data">
            <div class=""><label for="username">Username</label></div>
            <input id="username"  type="text" name="username" placeholder="username" value="" required>
        </div>
        <div class="form_row user-data">
                <div class=""><label for="email">Email Adresse</label></div>
                <input id="email"  type="email" name="email" placeholder="Email Adress" value="" required>
        </div>
        <div class="form_row user-data"> 
            <div class=""><label for="password">Password</label></div>
            <input id="password"  type="password" name="password" placeholder="Password" value="" required>
        </div>
        <div class="form_row">
            <button class="btn btn-primary" type="submit" name="submit">Log In
            </button>
        </div>
    </form>
</div>