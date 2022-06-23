<?php 
session_start();

if(!isset($_SESSION['login']) && !isset($_GET['uid'])) {
    header("Location: ../other/force_logout.php");
} else {


    include '../utils/functions.php';
    // check uid and session login
    $sql_s = "SELECT * FROM users WHERE unique_id = {$_SESSION['login']}";
    $sql_r = "SELECT * FROM users WHERE unique_id = {$_GET['uid']}";
    $query_s = mysqli_query($db, $sql_s);
    $query_r = mysqli_query($db, $sql_r);
    if (mysqli_num_rows($query_s) === 0 && mysqli_num_rows($query_r) === 0)
    {
        header("Location: ../others/force_logout.php");
    } else {
        $sender_id = $_SESSION['login'];
        $receiver_id = $_GET['uid'];
    }

    // get Chat
    $sql = "SELECT * FROM messages 
            WHERE 
            sender_msg_id = {$sender_id} AND receiver_msg_id = {$receiver_id} 
            OR 
            sender_msg_id = {$receiver_id} AND receiver_msg_id = {$sender_id}";
    $query = query($sql);
    // echo '<pre>' . var_export($query, true) . '</pre>';   
    
    $receiver_name = mysqli_fetch_assoc($query_r)['fullname'];

}
?>


<p class="text-center m-0 p-0">Chat Started</p>
<hr class="text-white">

<?php foreach($query as $msg): 
$msg['msg'] = htmlspecialchars($msg['msg']);

// $msg['msg'] = str_replace(['[u]', '[U]'], '<u>', $msg['msg']);
// $msg['msg'] = str_replace(['[/u]', '[/U]'], '</u>', $msg['msg']);

// $msg['msg'] = str_replace(['[b]', '[B]'], '<b>', $msg['msg']);
// $msg['msg'] = str_replace(['[/b]', '[/B]'], '</b>', $msg['msg']);

// $msg['msg'] = str_replace(['[s]', '[S]'], '<s>', $msg['msg']);
// $msg['msg'] = str_replace(['[/s]', '[/S]'], '</s>', $msg['msg']);

?>

<?php if($msg['receiver_msg_id'] === $sender_id): ?>
<?php 
    
if (filter_var($msg['msg'], FILTER_VALIDATE_URL)) {
    $msg['msg'] = '<a href="'.$msg['msg'].'">'.$msg['msg'].'</a>';
}

?>
<small class="d-block text-success"><span class="fst-italic"><?= $receiver_name ?>-></span>
    <span><?= ($msg['msg']) ?> </span></small>
<?php else: ?>
<?php 
    if (filter_var($msg['msg'], FILTER_VALIDATE_URL)) {
        $msg['msg'] = '<a href="'.$msg['msg'].'">'.$msg['msg'].'</a>';
    }
?>
<small class="d-block text-warning"><span class="fst-italic">You -></span>
    <span><?= ($msg['msg']) ?> </span></small>

<?php endif; ?>
<?php endforeach; ?>