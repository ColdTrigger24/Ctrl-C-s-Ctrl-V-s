<?php
    session_start();
    include "header.html";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600"><?php echo $_SESSION["username"] ?></h6>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                                                                    
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h3 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h4 class="m-b-10 f-w-600">Email</h4>
                                            <h5 class="text-muted f-w-600"><?php echo $_SESSION["email"]; ?></h5>
                                        </div>
                                        <br>
                                        <div class="col-sm-6">
                                            <h4 class="m-b-10 f-w-600">Phone</h4>
                                            <h5 class="text-muted f-w-600"><?php echo $_SESSION["phone"]; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-container">
            <button onclick = "window.location.href='update_info.php';" class="btn btn-primary">Update</button>
    </div>
    </div>
    <div class="additional-box">
        <div class="button-group">
            <button onclick = "window.location.href='home.php';" class="btn btn-secondary">Parking slot reservation</button>
            <button onclick = "window.location.href='maps.php';" class="btn btn-secondary">Service station locator</button>
            <button onclick = "window.location.href='demo.php';" class="btn btn-secondary">Charging dock locator</button>
        </div>
    </div>
</body>
</html>