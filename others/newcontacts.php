<?php session_start(); ?>
<?php include '../utils/functions.php'; ?>

<?php 
    

?>

<?php if(strlen($_GET['input']) >= 1): ?>
<?php $query = query("SELECT user_id, unique_id, fullname, img, status FROM users WHERE fullname LIKE '%{$_GET['input']}%' "); ?>

<small class="text-secondary">Found <?= count($query) ?> Users</small>
<?php foreach($query as $row): ?>
<?php 
        // check for existing contacts
        $contacts = query("SELECT * FROM contacts where user_uid = {$_SESSION['login']} AND contact_id = {$row['user_id']};");
        // echo '<pre>' . var_export($contacts, true) . '</pre>'; die;
?>
<?php if($row['unique_id'] !== $_GET['login'] && count($contacts) === 0): ?>

<div class="user">
    <div
        class="bg-transparent border border-secondary rounded-0 mb-3 p-1 d-flex justify-content-between align-items-center">
        <img src="img/<?= $row['img'] ?>" width="60" height="60" class="rounded-0">
        <h5 class="card-title d-inline ms-1"><?= $row['fullname'] ?></h5>
        <small class="bg-<?= ($row['status'] === 'Online')?'success':'danger' ?> text-white rounded p-1 mx-2"
            title="This User Is Currently Online"><?= $row['status'] ?></small>
        <form method="POST">
            <input type="text" name="new" value="<?= $row['unique_id'] ?>" hidden>
            <button class="btn btn-outline-success border border-secondary rounded-0" title="Add To Your Contacts">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>
    </div>
</div>
<?php elseif ( count($contacts) > 0 ): ?>
<div class="user">
    <div
        class="bg-transparent border border-secondary rounded-0 mb-3 p-1 d-flex justify-content-between align-items-center">
        <img src="img/<?= $row['img'] ?>" width="60" height="60" class="rounded-0">
        <h5 class="card-title d-inline ms-1"><?= $row['fullname'] ?></h5>
        <small class="bg-<?= ($row['status'] === 'Online')?'success':'danger' ?> text-white rounded p-1 mx-2"
            title="This User Is Currently Online"><?= $row['status'] ?></small>
        <button class="btn border border-secondary bg-black rounded-0 text-secondary"
            title="This user is already in your contact list" aria-disabled="true">
            <i class="fa-solid fa-plus""></i>
            </button>
        </div>
    </div>
<?php else: ?>
<div class=" user">
                <div
                    class="bg-transparent border border-secondary rounded-0 mb-3 p-1 d-flex justify-content-between align-items-center">
                    <img src="img/<?= $row['img'] ?>" width="60" height="60" class="rounded-0">
                    <h5 class="card-title d-inline ms-1"><?= $row['fullname'] ?></h5>
                    <small
                        class="bg-<?= ($row['status'] === 'Online')?'success':'danger' ?> text-white rounded p-1 mx-2"
                        title="This User Is Currently Online"><?= $row['status'] ?></small>
                    <button class="btn border border-secondary bg-black rounded-0 text-secondary"
                        title="You Can't Chat With Yourself <3" aria-disabled="true">
                        <i class="fa-solid fa-plus""></i>
        </button>
    </div>
</div>
<?php endif; ?>
<?php endforeach; ?>

<?php else: ?>
<small class=" text-secondary">Enter the username and it will appear here</small>
                            <?php endif; ?>