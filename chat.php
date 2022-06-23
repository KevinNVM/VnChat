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

    :root {
        --primary: #6c757d;
        --secondary: #000;
    }

    ::-moz-selection {
        /* Code for Firefox */
        color: var(--secondary);
        background: var(--primary);
    }

    ::selection {
        color: var(--secondary);
        background: var(--primary);
    }


    body {
        height: 100vh;
        background: var(--secondary);
        color: var(--primary);
    }

    .container {
        width: 750px;
        height: 750px;
    }

    .conversation {
        height: 620px;
        overflow-y: scroll;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    </style>
</head>

<?php 
    session_start();

    include 'utils/functions.php';

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }

    (!isset($_GET['uid']) || !isset($_GET)) ? header("Location: index.php") : $uid = $_GET['uid'] ;

    // query message
    $sender = $_SESSION['login'];
    $receiver = $uid;
    // $sql = "SELECT * FROM users WHERE unique_id = {$receiver}";
    // $query = mysqli_fetch_assoc(mysqli_query($db, $sql));
    // echo '<pre>' . var_export($msgs, true) . '</pre>';



?>

<body class="d-flex align-items-center">

    <div class="container border border-secondary shadow position-relative">

        <section class="receiver bg-black position-absolute d-flex align-items-center ">
            <div class="receiver-container">
                <img src="img/default.jpg" width="50" height="50" class="mt-2 me-3 placeholder">
                <h5 class="placeholder">Lorem, ipsum.</h5>
                <small class="bg-secondary text-white rounded p-1 ms-2 placeholder">Waiting</small>
            </div>
            <div class="dropdown">
                <a class="text-decoration-none text-secondary fs-3" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </a>
                <button class="btn rounded-0 border border-secondary text-secondary font-monospace"
                    onclick="scrollBottom()" id="scrollBottom">
                    <i class="fa-solid fa-arrow-down"></i>
                </button>

                <ul class="dropdown-menu rounded-0 shadow-none bg-black border border-secondary"
                    aria-labelledby="dropdownMenuLink">
                    <li>
                        <a class="dropdown-item text-secondary " href="http://localhost:82/chat-app-2/">Home</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-secondary "
                            href="http://localhost:82/chat-app-2/contacts.php">Contacts</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-secondary "
                            href="http://localhost:82/chat-app-2/block_person.php?uid=<?= $uid ?>"
                            title="Block This Person From Sending And Receiving Messages From You">Block</a>
                    </li>
                </ul>
            </div>
        </section>
        <br>
        <main class="conversation my-5 font-monospace">

            <p class="text-center m-0 p-0">Chat Started</p>
            <hr class="text-white">

            <small class="d-block text-success"><span class="fst-italic">John:</span>
                <span>$msg['msg']</span></small>

            <small class="d-block text-warning"><span class="fst-italic">You:</span>
                <span>$msg['msg']</span></small>


        </main>

        <div class="typing-area">
            <div class="row">
                <div class="col input-group position-absolute bottom-0 pb-2">
                    <input type="text"
                        class="form-control rounded-0 bg-transparent text-secondary border border-secondary bg-black font-monospace"
                        placeholder="Type Message" autocomplete="off" autofocus name="msg">
                    <button class="btn text-secondary rounded-0 font-monospace border border-secondary"
                        id="btn-send">Send</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
    // Topbar Section
    setInterval(function() {

        $.ajax({
            type: "GET",
            url: "http://localhost:82/chat-app-2/others/topbar_r.php",
            data: {
                receiver: "<?= $receiver ?>",
            },
            success: function(response) {
                $('.receiver .receiver-container').html(response);
            }
        });

    }, 750); // Update every 750ms

    // Dynamic chat Section
    setInterval(() => {
        $.ajax({
            type: "GET",
            url: "http://localhost:82/chat-app-2/others/chat.php",
            data: {
                uid: "<?= $receiver ?>",
                login: "<?= $sender ?>"
            },
            success: function(response) {
                $('.conversation').html(response);
                // console.log(response.responseText);
            },
            error: function(response) {
                $('.conversation').html(`<h6>Something Went Wrong, Please Try Again Later</h6>`);
                // $('.conversation').html(response);
                // console.log(response.responseText);
            }
        });
    }, 250); // Update every ..

    // Insert Chat Section
    $(document).on('keypress', function(e) {
        if (e.which == 13) { // Run ajax when key ENTER is pressed 

            // send data using POST method
            // check if the message is not empty
            if ($('input[name=msg]').val().length !== 0) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:82/chat-app-2/others/insertChat.php",
                    data: {
                        sender: "<?= $sender ?>",
                        receiver: "<?= $receiver ?>",
                        message: $('input[name=msg]').val(),
                    },
                    success: function(response) {
                        $('input[name=msg]').val('');
                        setTimeout(() => {
                            $('.conversation').children().last()[0].scrollIntoView()
                        }, 520);
                        // $('body').prepend(response);
                    }
                });
            } else {
                $('input[name=msg]').focus();
            }

        }
    });

    $('button#btn-send').click(function() {
        // send data using POST method
        // check if the message is not empty
        if ($('input[name=msg]').val().length !== 0) {
            $.ajax({
                type: "POST",
                url: "http://localhost:82/chat-app-2/others/insertChat.php",
                data: {
                    sender: "<?= $sender ?>",
                    receiver: "<?= $receiver ?>",
                    message: $('input[name=msg]').val(),
                },
                success: function(response) {
                    $('input[name=msg]').val('');
                    setTimeout(() => {
                        $('.conversation').children().last()[0].scrollIntoView()
                    }, 50);
                    // $('body').prepend(response);
                }
            });

        } else {
            $('input[name=msg]').focus();
        }
    });

    // Scroll Bottom Button
    function scrollBottom() {
        document.querySelector('.conversation').scrollTop = document.querySelector('.conversation').scrollHeight;
    }
    </script>
</body>

</html>