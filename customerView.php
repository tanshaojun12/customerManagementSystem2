<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View customer Details</title>
</head>
<body>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>View customer Details
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $customer_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM customerInfo WHERE customer_id='$customer_id' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $customer = mysqli_fetch_array($query_run);
                            ?>

                            <div class="mb-3">
                                <label>Name</label>
                                <p class="form-control">
                                    <?=$customer['name'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <p class="form-control">
                                    <?=$customer['email'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <p class="form-control">
                                    <?=$customer['phone'];?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <p class="form-control">
                                    <?=$customer['address'];?>
                                </p>
                            </div>
                            <?php
                        }
                        else
                        {
                            echo "<h4>No result found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>