<?php
session_start();
require 'includes/database.php';

include('includes/header.php');
?>

<div style="margin-top: 120px" id="content"></div>
<main>

<!-- Slovo -->
<div class="container shadow-sm p-3 mb-5 text-center" style="border-radius: 10px">
  <h4>Náhodné Jounasovo slovo</h4>
  <h6>
    <?php
    $koren = array("mrd", "uw", "ow", "mam", "rip", "au", "ef", "lol");
    $koren_vysledek = array_rand($koren);
    echo $koren[$koren_vysledek];

    $pripona = array("inka", "ánek", "ina", "áček", "ínek", "ík", "íček", "inda");
    $pripona_vysledek = array_rand($pripona);
    echo $pripona[$pripona_vysledek];
    ?>
  </h6>
  <hr class="horizontal dark">
  <h4>Náhodné kdo to byl</h4>
  <h6>
    <?php
    $kdo = array("Petrušková", "Škrabánek", "Šoula", "Burda", "Tom V", "Cillé");
    $kdo_tobyl = array_rand($kdo, 2);
    echo $kdo[$kdo_tobyl[0]];
    ?>
  </h6>
  <button onClick="window.location.reload();" class="btn bg-gradient-warning">Obnovit</button>
</div>

<!-- Obsah -->
<div class="container shadow-sm p-3 mb-5" style="border-radius: 10px">
  <?php
  $query = "SELECT * FROM stats ORDER BY `id`";
  $query_run = mysqli_query($connection, $query);

  if(mysqli_num_rows($query_run) > 0)
  {
    while($row = mysqli_fetch_assoc($query_run))
  {
  ?>
  <p><?php echo $row['content']; ?></p>
  <?php
    }
  }
  else {
    echo '<div class="container ps-3 pe-3"><div class="alert alert-danger" role="alert" style="color: white">Nebyl nalezen obsah</div></div>';
  }
?>
</div>

</main>
<?php
include('includes/footer.php');
?>