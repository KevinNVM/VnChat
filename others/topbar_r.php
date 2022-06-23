<?php 
    include '../utils/functions.php';
    $sql = "SELECT * FROM users WHERE unique_id = {$_GET['receiver']}";
    $query = mysqli_query($db, $sql);
    
?>
<?php if(mysqli_num_rows($query) !== 0) :  ?>
<?php $result = mysqli_fetch_assoc($query); ?>
<img src="img/<?= $result['img'] ?>" width="50" height="50" class="mt-2 me-3">
<h5 class="d-inline"><?= $result['fullname'] ?></h5>
<small
    class="bg-<?= ($result['status'] === 'Online')?'success':'danger' ?> text-white rounded p-1 ms-2"><?= $result['status'] ?></small>
<?php else: ?>
<img src="img/default.jpg" width="50" height="50" class="mt-2 me-3 placeholder" title="User Does Not Exist">
<h5 class="d-inline" data-bs-toggle="tooltip" data-bs-html="true" title="<b>User Does Not Exist</b>" role="button">
    User Does Not Exist.
</h5>
<small class="bg-secondary text-white rounded p-1 ms-2 placeholder" title="User Does Not Exist">Waiting</small>
<?php endif; ?>