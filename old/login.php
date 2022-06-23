<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | VnChat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<?php include 'php/functions.php' ?>

<body>

    <?php 
    
        if(isset($_POST['submit'])) {
            $fullname = $_POST['fname'].' '.$_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone-number'];
            $password = $_POST['password'];

            // validation
            if(strlen($password) < 8) {
                $_SESSION['error'] = 'Password must be at least 8 characters';
                // $_SESSION['old'] = ['fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'phone-number' => $_POST['phone-number'], 'password' => $_POST['password']];
                
                return false;
            }

            

        }
    
    ?>

    <div class="my-container d-flex align-items-center justify-content-center form">
        <form action="" method="POST">
            <section aria-label="register">
                <div class="card card-login shadow rounded">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Login to Your Account</h2>
                            <!-- svg -->
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
                            <!-- error messages -->
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    An example danger alert with an icon
                                </div>
                            </div>
                            <!-- end error messages -->
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="email-phone" class="form-label">Email or Phone Number</label>
                                    <input type="email-phone" class="form-control" id="email-phone" name="email-phone"
                                        placeholder="Enter Your Email or Phone Number">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter Your Password">
                                        <div class="input-group-text">
                                            <input class="form-check-input mt-0 show-pass visually-hidden"
                                                id="show-pass" type="checkbox" aria-label="show password button">
                                            <label for="show-pass" id="label-show-pass"><i
                                                    class="bi bi-eye-fill"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid my-2">
                                <button class="btn btn-primary" name="submit">Login</button>
                            </div>
                            <hr>
                            <section id="links">
                                <p>Didn't Have an Account Yet? Click <a
                                        href="http://localhost:82/chat-app-2/register.php">Here</a> To Register</p>
                            </section>
                    </div>
                </div>
            </section>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>