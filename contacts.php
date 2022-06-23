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
        width: 750px;
        height: 750px;
    }

    .img-profile {
        transition: all 200ms;
    }

    .img-profile:hover {
        opacity: 90%;
    }

    #receiver-list {
        height: 69%;
        overflow-y: auto;
    }

    .card {
        overflow-x: hidden;
    }

    .receiver {
        cursor: pointer;
        transition: all 100ms;
    }

    .modal-content {
        height: 600px;
    }

    .user-list {
        height: 400px;
        overflow-y: auto;
    }
    </style>
</head>
<?php 
session_start();
include 'utils/functions.php';
// echo '<pre>' . var_export($_SESSION['login'], true) . '</pre>'; die;


if(!isset($_SESSION['login'])) {
    header("Location: login.php");
}
    
if(isset($_POST['new']) && strlen($_POST['new']) > 0) {
    if(addContact($_SESSION['login'], $_POST['new']) > 0) {
        $msg = 'Added New Contact';
        header("Location: contacts.php");
    }
}

?>

<body class="d-flex align-items-center">

    <div class="container border border-secondary shadow position-relative">

        <section id="user-id" class="d-flex flex-row-reverse align-items-center justify-content-between">
            <a href="#">
                <img src="img/default.jpg" width="50" height="50" class="img-profile mt-2 ms-3 placeholder">
            </a>
            <small class="bg-success text-white rounded p-1 me-2 placeholder">Online</small>
        </section>
        <div class="dropdown">
            <button type="button"
                class="btn border border-secondary rounded-0 text-white position-relative mt-2 inbox-title"
                data-bs-toggle="dropdown" aria-expanded="false">
                Messages
            </button>
            <ul class="dropdown-menu rounded-0 shadow-none bg-black border border-secondary"
                aria-labelledby="dropdownMenuLink">
                <li>
                    <a class="dropdown-item text-secondary " href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#AddNewContacts">Add New Contacts</a>
                </li>
                <li>
                    <a class="dropdown-item text-secondary " href="http://localhost:82/chat-app-2/logout.php">Logout</a>
                </li>
            </ul>
        </div>

        <div class="modal fade" id="AddNewContacts" tabindex="-1" aria-labelledby="AddNewContactsLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-black border border-secondary font-monospace rounded-0">
                    <div class="modal-header border-bottom border-secondary">
                        <h5 class="modal-title" id="headerModal">Add New Contacts</h5>
                        <button type="button" class="btn text-secondary rounded-0 border border-secondary"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark fa-lg"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="addnewcontacts.php" id="newcontacts">
                            <label for="fullname">Fullname</label>
                            <div class="input-group">
                                <input type="text" max="255"
                                    class="form-control rounded-0 border border-secondary font-monospace text-secondary bg-transparent"
                                    placeholder="Search User" id="fullname" autocomplete="off">
                                <button type="button"
                                    class="btn rounded-0 border border-secondary text-secondary font-monospace visually-hidden">Search</button>
                            </div>
                        </form>

                        <div class="user-list mt-3">

                            <small class="text-secondary">Enter the username and it will appear here</small>



                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>

        <hr class="text-white">

        <form action="#" id="search-receiver">
            <div class="input-group mb-2">
                <input type="text"
                    class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                    placeholder="Search" autocomplete="off" autofocus name="q">
                <button class="btn btn-dark text-secondary rounded-0 font-monospace visually-hidden">Search</button>
            </div>
        </form>

        <hr>

        <section id="receiver-list">

            <?php if(isset($msg)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Added New Contact
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <?php 
            $query = query("SELECT * FROM contacts INNER JOIN users ON contacts.contact_id = users.user_id WHERE contacts.user_uid = {$_SESSION['login']}");
            // echo '<pre>' . var_export($query, true) . '</pre>'; die;
            ?>

            <?php $key = 1; foreach($query as $row) : ?>
            <?php if($row['unique_id'] !== $_SESSION['login']): ?>
            <div class="receiver">
                <div class="bg-transparent border border-secondary rounded-0 mb-3 p-1">
                    <a href="http://localhost:82/chat-app-2/chat.php?uid=<?= $row['unique_id'] ?>"
                        class="text-decoration-none text-secondary">
                        <div>
                            <img src="img/<?= $row['img'] ?>" width="60" height="60" class="rounded-0">
                            <h5 class="card-title d-inline ms-1"><?= $row['fullname'] ?></h5>
                            <small
                                class="bg-<?= ($row['status'] == 'Online')?'success':'danger' ?> text-white rounded p-1 mx-2"><?= $row['status'] ?></small>
                        </div>
                    </a>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>

        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    // Contacts Section
    setInterval(function() {

        $.ajax({
            type: "GET",
            url: "http://localhost:82/chat-app-2/others/contacts.php",
            data: {
                login: <?= $_SESSION['login'] ?>,
            },
            success: function(response) {
                $('#receiver-list').html(response);
            }
        });

    }, 1000); // update section every 1s

    // Topbar Section
    $.ajax({
        type: "GET",
        url: "http://localhost:82/chat-app-2/others/topbar.php",
        data: {
            login: "<?= $_SESSION['login'] ?>",
        },
        success: function(response) {
            $('#user-id').html(response);
        }
    });

    // add new contacts Section
    $('input#fullname').on('keyup', function() {
        $('.user-list').html(`
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>`);
        setTimeout(() => {
            $.ajax({
                type: "GET",
                url: "http://localhost:82/chat-app-2/others/newcontacts.php",
                data: {
                    login: "<?= $_SESSION['login'] ?>",
                    input: $('input#fullname').val(),
                },
                success: function(response) {
                    $('.user-list').html(response);
                }
            });
        }, 10);
    });
    </script>
</body>

</html>