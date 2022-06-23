<?php include '../utils/functions.php'; ?>
<?php $query = query("SELECT * FROM contacts INNER JOIN users ON contacts.contact_id = users.user_id WHERE contacts.user_uid = {$_GET['login']}"); ?>

<?php $key = 1; foreach($query as $row) : ?>
<?php if($row['unique_id'] !== $_GET['login']): ?>
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