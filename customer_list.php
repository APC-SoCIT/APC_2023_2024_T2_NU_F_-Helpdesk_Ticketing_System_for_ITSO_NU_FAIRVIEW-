<?php include 'db_connect.php' ?>
<div class="col-lg-12">
    <div class="">
        <div class="card-header">
            <div class="card-tools">
                <a href="index.php?page=new_customer" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i> New User</a>
                <?php if ($_SESSION['login_type'] == 1): // Check if the user is an admin ?>
                <a href="index.php?page=new_staff" class="btn btn-sm btn-primary mr-2"><i class="fa fa-plus"></i> New Admin</a>
                <?php endif; ?>
                <a href="index.php?page=home"><button type="button" class="btn btn-secondary mr-4"><i class="bi bi-arrow-left-short"></i> Return</button></a>
            </div>
        </div>
        <div class="card	">
            <div class="card-body">
                <table class="table tabe-hover table-bordered" id="list">
                    <thead>
                        <tr>
                            <th style="background-color: #34418E;    color: white;">#</th>
                            <th style="background-color: #34418E;    color: white;">Name</th>
                            <th style="background-color: #34418E;    color: white;">Contact #</th>
                            <th style="background-color: #34418E;    color: white;">Address</th>
                            <th style="background-color: #34418E;    color: white;">Email</th>
                            <th style="background-color: #34418E;    color: white;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $qry = $conn->query("SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM customers order by concat(lastname,', ',firstname,' ',middlename) asc");
                        while ($row = $qry->fetch_assoc()):
                        ?>
                            <tr>
                                <th class="text-center"><?php echo $i++ ?></th>
                                <td><b><?php echo ucwords($row['name']) ?></b></td>
                                <td><b><?php echo $row['contact'] ?></b></td>
                                <td><b><?php echo $row['address'] ?></b></td>
                                <td><b><?php echo $row['email'] ?></b></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="./index.php?page=edit_customer&id=<?php echo $row['id'] ?>">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_customer" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#list').dataTable()

        $('.delete_customer').click(function () {
            _conf("Are you sure to delete this customer?", "delete_customer", [$(this).attr('data-id')])
        })
    })

    function delete_customer($id) {
        start_load()
        $.ajax({
            url: 'ajax.php?action=delete_customer',
            method: 'POST',
            data: { id: $id },
            success: function (resp) {
                if (resp == 1) {
                    alert_toast("Data successfully deleted", 'success')
                    setTimeout(function () {
                        location.reload()
                    }, 1500)
                }
            }
        })
    }
</script>
