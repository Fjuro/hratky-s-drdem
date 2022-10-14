<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- PAGE CONTENT -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Přidávání obrázku</h1>
  <div class="mb-4"></div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Přidávání obrázku</h6>
    </div>
    <div class="card-body">
        <?php
          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
          {
            echo '<div class="card mb-4 py-3 border-left-success"><div class="card-body"> '.$_SESSION['success'].' </div></div>';
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          {
            echo '<div class="card mb-4 py-3 border-left-danger"><div class="card-body"> '.$_SESSION['status'].' </div></div>';
            unset($_SESSION['status']);
          }
        ?>
      <form action="server.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <p><b>Jak přidat obrázek</b><br>
                1. Jdi na <a href="https://ibb.co">IBB</a> a klikni na Nahrát<br>
                2. Vyber obrázky které chceš nahrát a nahraj je<br>
                3. Počkej až se nahrají a na každý z nich klikni, každý se otevře v nové kartě<br>
                4. Klikni na obrázek pravým a dej Kopírovat adresu obrázku<br>
                5. Vlož zkopírovanou adresu do pole Adresa níže
            <div class="form-group">
                <label>Název (popis)</label>
                <input type="text" name="gallery_name" class="form-control">
            </div>
            <div class="form-group">
                <label>Adresa obrázku</label>
                <input type="url" name="gallery_image" class="form-control">
            </div>
        <div class="modal-footer">
            <a href="gallery.php"><button type="button" class="btn btn-warning" data-dismiss="modal">Zrušit</button></a>
            <button type="submit" name="creategallery" class="btn btn-success">Potvrdit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>