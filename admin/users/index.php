<?php
define('TITLE', "Home");
include '../assets/layouts/header.php';
include "../../states.php";
check_admin_verified();
$sql = "SELECT username,email,CONCAT(first_name,' ',last_name) as name, created_at FROM `users` where deleted_at is null and user_level = 0";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$x = 1;
?>
    <main role="main" class="container-fluid">
        <div class="row">
            <?php include "../sidebar.php"; ?>
            <div class="col-sm-10"><br>
                <h3>Users</h3>
                <hr>
                <div class="table-responsive">
                    <table id="user_table" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>User Name</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?= $x++ ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#user_table thead th').each( function () {
                var title = $(this).text();
                $(this).append( '<input type="text" placeholder="Search '+title+'" />' );
            } );

            // DataTable
            var table = $('#user_table').DataTable({
                buttons: [ 'excel' ],
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;

                        $( 'input', this.header() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }
                        } );
                    } );
                }
            });

            table.buttons().container()
                .appendTo( '#user_table_wrapper .col-md-6:eq(0)' );
        } );
    </script>
<?php include '../assets/layouts/footer.php' ?>