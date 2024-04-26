<?php 
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='Alogin.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://kit.fontawesome.com/57fc0d57b8.js" rel="stylesheet" crossorigin="anonymous">
    <style>
        /* Add this CSS to change the color scheme to yellow and orange */
        .top-header {
            padding: 20px;
            text-align: center;
            color: white;
        }

        .bg-warning {
            background-color: #FFA500 !important; /* orange background color */
        }

        /* Remove the sidebar */
        .sidebar {
            display: none;
        }

        /* Adjust main content width */
        .main-content {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-12 main-content">
            <header class="top-header bg-warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Welcome Admin</h1>
                        <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        
                    </div>
                </header>
                
                <h2 class="mt-3">Contacts</h2>
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"> Name</th>
                                <th scope="col"> Phone</th>
                                <th scope="col"> Fund</th>
                                <th scope="col"> Address</th>
                                <th scope="col"> Message</th>
                                <th scope="col"> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include 'db.php';
                            $sql = "SELECT * FROM `contact`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["phone"] . "</td>";
                                    echo "<td>" . $row["fund"] . "</td>";
                                    echo "<td>" . $row["address"] . "</td>";
                                    echo "<td>" . $row["message"] . "</td>";
                                    echo "<td><a href='deletecont.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No data found</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Yv..."></script>
</body>
</html>
