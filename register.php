<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VnChat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css");

    ::-moz-selection {
        /* Code for Firefox */
        color: #000;
        background: #6c757d;
    }

    ::selection {
        color: #000;
        background: #6c757d;
    }

    body {
        height: 100vh;
        background: #000;
        color: #6c757d;
    }

    .container {
        width: 600px;

    }
    </style>
</head>
<?php 
    session_start();
    include 'utils/functions.php';

    if(isset($_SESSION['login'])) {
        header("Location: index.php");
    }

    
    // echo '<pre>' . var_export($_POST, true) . '</pre>';
    if(isset($_POST['submit'])) {
        $fname      = htmlspecialchars($_POST['fname']);
        $lname      = htmlspecialchars($_POST['lname']);
        $username   = htmlspecialchars($_POST['username']);
        $email      = htmlspecialchars($_POST['email']);
        $password   = $_POST['password'];

        
        $query = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
        
        if(!empty($username) && !preg_match('/\s/', $username)) {
            if (mysqli_num_rows($query) === 0) {
                if(strlen($password) >= 8 && !preg_match('/\s/', $password)) {
                    if(insertData($_POST) == 1) {
                        echo '<script>alert("Register Success, Please Login With Your Account"); location = "http://localhost:82/chat-app-2/login.php"</script>';
                    } else {
                        echo '<script>alert("Register Failed L");</script>';
                    }
                } else {
                    $error = 'Password must be atleast 8 characters long AND Must not contain any whitespaces';
                }
            } else {
                $error = 'Username already exist';
            }
        } else {
            $error = 'Username cannot be empty AND Cannot contain any whitespaces';
        }


    }
?>

<body class="d-flex align-items-center">
    <main class="container border border-secondary shadow position-relative py-2">
        <div class="dropdown text-center">
            <button type="button"
                class="btn border border-secondary rounded-0 text-secondary position-relative fs-4 mt-2 text-secondary inbox-title"
                data-bs-toggle="dropdown" aria-expanded="false">
                Register to Create Your Account
            </button>
            <ul class="dropdown-menu rounded-0 shadow-none bg-black border border-secondary"
                aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item text-secondary " href="http://localhost:82/chat-app-2/Login.php">Login</a>
                </li>
            </ul>
        </div>
        <form method="POST">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>

            <section id="login">
                <?php if(isset($error)): ?>
                <!-- Errors -->
                <div class="alert error border border-danger rounded-0 d-flex align-items-center mt-2" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?= $error ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <!-- First Name -->
                    <div class="col-12 col-sm-6">
                        <label for="fname" class="form-text text-secondary">First Name</label>
                        <input type="text" id="fname" name="fname"
                            class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                            autocomplete="true" required>
                    </div>
                    <!-- Last Name -->
                    <div class="col-12 col-sm-6">
                        <label for="lname" class="form-text text-secondary">Last Name</label>
                        <input type="text" id="lname" name="lname"
                            class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                            autocomplete="true">
                    </div>
                    <!-- Username -->
                    <div class="col-12">
                        <label for="username" class="form-text text-secondary">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                            autocomplete="true" required>
                        <!-- Email -->
                        <div class="col-12">
                            <label for="email" class="form-text text-secondary">Email Recovery (Optional)</label>
                            <input type="text" id="email" name="email"
                                class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                                autocomplete="true">
                        </div>
                        <!-- Password -->
                        <div class="col-12">
                            <label for="password" class="form-text text-secondary">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                                    autocomplete="true" required>
                                <div class="input-group-text px-1">
                                    <input class="form-check-input mt-0 visually-hidden" type="checkbox" id="show-pass"
                                        aria-label="Checkbox for following pass input">
                                    <label for="show-pass" id="show-pass-label"><i
                                            class="fa-regular fa-eye fa-lg"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button class="btn btn-dark text-secondary rounded-0 mb-3" name="submit">Register</button>
                    </div>
                    <hr class="text-white">
                    <div class="login-link font-monospace text-secondary">
                        Already Have an Account? Click <a href="http://localhost:82/chat-app-2/login.php">Here</a> To
                        Login
                    </div>
            </section>
        </form>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function() {

            // Show Password
            $('input[type=checkbox]').on('click', function() {
                if ($('#password').attr('type') === "password") {
                    $('#password').attr('type', 'text');
                    $('label#show-pass-label').html('<i class="fa-regular fa-eye-slash fa-lg"></i>');
                } else {
                    $('#password').attr('type', 'password');
                    $('label#show-pass-label').html('<i class="fa-regular fa-eye fa-lg"></i>');
                }
            });


        });
        </script>
</body>

</html>