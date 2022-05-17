<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !='')
{
  echo '<div class="alert alert-success ps-5 pe-5" role="alert"> '.$_SESSION['success'].' </div>';
  unset($_SESSION['success']);
}

if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
  echo '<div class="alert alert-danger ps-5 pe-5" role="alert"> '.$_SESSION['status'].' </div>';
  unset($_SESSION['status']);
}
?>
<?php
require 'includes/database.php';

$query = "SELECT * FROM stats";
$query_run = mysqli_query($connection, $query);

if(mysqli_num_rows($query_run) > 0)
{
  while($row = mysqli_fetch_assoc($query_run))
  {
?>
<div class="container-fluid">

  <h1 class="h3 mb-2 text-gray-800">Statistiky</h1>
  <div class="mb-4"></div>

  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
            <form action="statsedit.php" method="post">
              <input type="hidden" name="edit_gallery_id" value="1">
              <button type="submit" name="edit_gallery" class="btn btn-warning"><i class="fas fa-edit"></i> Upravit statistiky</button>
            </form>
          </h6>
      </div>
      <div class="card-body">
          <div>
            <?php echo $row['content']; ?>
            <?php
              }
            }
            else {
              echo "Chyba - nahlas toto prosím Jonasovi";
            }
          ?>
          </div>
      </div>
  </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>