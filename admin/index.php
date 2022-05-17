<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Přehled</h1>
        <a href="https://gymhu.bakalari.cz/bakaweb" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-book-open fa-sm text-white-50"></i> Bakaláři</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="articles.php" style="color: inherit; text-decoration: none;">Celkem článků</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php
                                require 'includes/database.php';

                                $query = "SELECT id FROM articles ORDER BY id";
                                $query_run = mysqli_query($connection, $query);

                                $row = mysqli_num_rows($query_run);

                                echo $row;
                              ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <a href="articles.php" style="text-decoration: none;"><i class="fas fa-newspaper fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="users.php" style="color: inherit; text-decoration: none;">Celkem uživatelů</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php
                                require 'includes/database.php';

                                $query = "SELECT id FROM users ORDER BY id";
                                $query_run = mysqli_query($connection, $query);

                                $row = mysqli_num_rows($query_run);

                                echo $row;
                              ?>
                            </div>
                        </div>
                        <div class="col-auto">
                          <a href="articles.php" style="text-decoration: none;"><i class="fas fa-users fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Čas
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      <?php
                                      date_default_timezone_set("Europe/Prague");
                                      echo date("H:i");
                                      ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Datum</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo date("d. m."); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pohár</h6>
                </div>
                <div class="card-body">
                <div><?php $html = ""; $url = "https://www.soccerstats247.com/MatchResultsRssWidget.aspx?langId=15&leagueId=1522";$xml = simplexml_load_file($url); foreach($xml->channel->item as $item){$html .= $item->description;$html;}echo $html; ?></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pravidla</h6>
                </div>
                <div class="card-body">
                  <ul>
                    <li>Pravidlo 1</li>
                    <li>Pravidlo 2</li>
                    <li>Pravidlo 3</li>
                    <li>...</li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Česká liga</h6>
                </div>
                <div class="card-body">
                <div><?php $html = ""; $url = "https://www.soccerstats247.com/MatchResultsRssWidget.aspx?langId=15&leagueId=1184";$xml = simplexml_load_file($url); foreach($xml->channel->item as $item){$html .= $item->description;$html;}echo $html; ?></div>
                </div>
            </div>
        </div>
        

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>