<?php
$link = trim($_SERVER["REQUEST_URI"],"/");
$link_array = explode('/',$link);
$page = end($link_array);
?>
<div style="padding: 0" class="col-sm-2">
    <div class="sidebar">
        <a class=" <?= ($page == 'dashboard') ? 'active' : '' ?>" href="../dashboard">Dashboard</a>
        <a class=" <?= ($page == 'users') ? 'active' : '' ?>" href="../users">Users</a>
        <a class=" <?= ($page == 'reports') ? 'active' : '' ?>" href="../reports">Reports</a>
    </div>
</div>