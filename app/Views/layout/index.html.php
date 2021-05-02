<?php
dump_to_file($output);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo | <?=$output['title']?></title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?=loadAsset("css/common.css")?>">
    <link rel="stylesheet" href="<?=loadAsset("css/project.css")?>">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <a class="menu-icon" id="show-menu" href="#"><i class="fas fa-bars"></i></a>
            <div class="col-sm-2 left-side-menu" id="left-menu">
                <div class="brand">
                    <div class="row">
                        <div class="col-10">
                        <h3><?=getAppConfig('site-title')?></h3>
                        </div>
                        <div class="col-2">
                        <a id="hide-menu" class="menu" href="#"> <i class="fas fa-bars"></i> </a>
                        </div>
                    </div>
                </div>

                <ul>
                    <li><a href="home"> <i class="fas fa-home"></i> Home</a></li>
                </ul>
            </div> <!-- Left side menu-->

            <div class="col-sm-10 right-side">
                <!--  -->
                <div class="home-head">
                    <h2><?=$output['title']?></h2>
                    <div class="user-info">
                        <p class="user-icon"><?=$user->getUserEmail()?></p>
                        <a class="btn btn-secondary" href="user-logout">Logout</a>
                    </div>
                </div> <!-- Home head-->
                <hr>
                <div class="page-content">
                    <?=$output["pageContent"]?>
                </div>
            </div> <!-- Right side Area-->
        </div> <!--Row -->
    </div> <!-- Container fluid -->

    <div id="loading-overlay" style="display:none;">
        <div class="spinner">
        </div>
    </div>

    <!-- Bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Commons js file -->
    <script src="<?=loadAsset("js/common.js")?>"></script>
</body>

</html>