<?php
session_start();
require 'config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Customer Management System</title>
</head>
<body>

<div class="container mt-4">

    <?php include('message.php'); ?>

    <h1>Customer Management System</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Customer Details
                        <a href="customerAdd.php" class="btn btn-primary float-end">Add new customer</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM customerInfo";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $customer)
                            {
                                ?>
                                <tr>
                                    <td><?= $customer['customer_id']; ?></td>
                                    <td><?= $customer['name']; ?></td>
                                    <td><?= $customer['email']; ?></td>
                                    <td><?= $customer['phone']; ?></td>
                                    <td><?= $customer['address']; ?></td>
                                    <td>
                                        <a href="customerView.php?id=<?= $customer['customer_id']; ?>" class="btn btn-info btn-sm">View</a>
                                        <a href="customerEdit.php?id=<?= $customer['customer_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                        <form action="feature.php" method="POST" class="d-inline">
                                            <button type="submit" name="customer_delete" value="<?=$customer['customer_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h5> No Record Found,Try again Please</h5>";
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>