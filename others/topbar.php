<?php 
    include '../utils/functions.php';
    $sql = "SELECT * FROM users WHERE unique_id = {$_GET['login']}";
    $query = mysqli_fetch_assoc(mysqli_query($db, $sql));
?>

<a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Currently Login as: <?= $query['username'] ?>">
    <img src="img/<?= $query['img'] ?>" width="50" height="50" class="img-profile mt-2 ms-3">
</a>
<small class="bg-<?= ($query['status'] === 'Online')?'success':'danger' ?> text-white rounded p-1 me-2"
    title="Activity Status Displayed To Everyone"><?= $query['status'] ?></small>