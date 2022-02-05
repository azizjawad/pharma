<?php
define('TITLE', "Home");
include '../assets/layouts/header.php';
include "../../states.php";
check_admin_verified();
$sql = "SELECT COUNT(1) as total, state FROM `leads` GROUP BY state";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<main role="main" class="container-fluid">
    <div class="row">
        <?php include "../sidebar.php"; ?>
        <div class="col-sm-10"><br>
            <h3>Leads</h3>
            <hr>
            <div class="row">
                <br>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $states[$row['state']] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Total Leads</h6>
                                <p class="card-text"><?php echo $row['total'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php include '../assets/layouts/footer.php' ?>