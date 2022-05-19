<?php
session_start();
if (strlen($_SESSION['userID']) == "") {
    header('location:logout.php');
}
?>
<?php
include("classes/model.php");
$user = new User();
$id = $_REQUEST['id'];
$row = $user->edit($id);

if (isset($_POST["update"])) {
    $data['id'] = $id;
    $data['firstname'] = $_POST["FIRSTNAME"];
    $data['lastname'] = $_POST["LASTNAME"];
    $data['username'] = $_POST["USERNAME"];
    $data['email'] = $_POST["EMAIL"];

    $update = $user->update($data);

    if ($update) {
        echo '<script>alert("User updated successfully");</script>';
        echo '<script>window.location.href = "records.php"</script>';
    } else {
        echo '<script>alert("User not updated");</script>';
        echo '<script>window.location.href = "edit.php?id=$id"</script>';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>EbuCodes · Register</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <h4 class="navbar-brand" style="color: red;">Ebu<b style="color: green;">Codes</b></h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                </ul>
                <a href="logout.php" class="btn btn-danger">Log Out</a>

            </div>
        </div>
    </nav>
    <br><br><br>
    <main class="container">
        <div class="card text-center">
            <div class="card-header bg-success">
                <h4 class="card-title">UPDATE</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <!-- <h4 class="mb-3"></h4> -->
                        <form method="POST" class="needs-validation" novalidate>
                            <div class="row g-3">

                                <div class="col-sm-4">
                                    <label for="FIRSTNAME" class="form-label">First name</label>&nbsp;<span style="color: red;">*</span>
                                    <input type="text" class="form-control" name="FIRSTNAME" id="FIRSTNAME" value="<?php echo $row['firstname']; ?>" placeholder="Your first name" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="LASTNAME" class="form-label">Last name</label>&nbsp;<span style="color: red;">*</span>
                                    <input type="text" class="form-control" name="LASTNAME" id="LASTNAME" value="<?php echo $row['lastname']; ?>" placeholder="Your last name" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="LASTNAME" class="form-label">Username</label>&nbsp;<span style="color: red;">*</span>
                                    <input type="text" class="form-control" name="USERNAME" id="USERNAME" value="<?php echo $row['username']; ?>" placeholder="Your username" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="email" class="form-label">Email Address</label>&nbsp;<span style="color: red;">*</span>
                                    <input type="email" name="EMAIL" class="form-control" id="email" value="<?php echo $row['email']; ?>" placeholder="Your email address" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>


                            </div>

                            <br class="my-2">

                            <button name="update" class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="container">

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Form validation -->
    <script src="assets/js/form-validation.js"></script>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>