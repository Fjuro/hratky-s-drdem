<?php
session_start();
?>
<!DOCTYPE html>
<html lang="cs">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Přihlášení do administrace</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-hratky"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Přihlásit se</h1>
                                        <?php
                                          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                                          {
                                            echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['status'].' </div>';
                                            unset($_SESSION['status']);
                                          }
                                        ?>
                                    </div>
                                    <form class="user" action="server.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Jméno">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Heslo">
                                        </div>
                                        <button type="submit" name="login_button" class="btn btn-primary btn-user btn-block">Přihlásit se</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
  </body>

</html>
<?php
include('includes/scripts.php');
?>