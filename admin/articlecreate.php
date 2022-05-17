<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- PAGE CONTENT -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Tvorba článku</h1>
  <div class="mb-4"></div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tvorba článku</h6>
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
                <label>Nadpis<br><small>Max 50 znaků</small></label>
                <input type="text" name="article_title" class="form-control">
            </div>
            <div class="form-group">
                <label>Datum</label>
                <input type="date" name="article_date" class="form-control">
            </div>
            <div class="form-group">
              <label>Obsah</label>
              <textarea type="text" name="article_content" class="form-control"></textarea>
              <script>
                tinymce.init({
                  selector: 'textarea',
                  plugins: 'advlist autosave autolink image imagetools link lists emoticons preview',
                  toolbar_mode: 'floating',
                  toolbar: 'undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | numlist bullist | emoticons link image | preview',
                  language: 'cs'
                });
              </script>
            </div>
        </div>
        <div class="modal-footer">
            <a href="articles.php"><button type="button" class="btn btn-warning" data-dismiss="modal">Zrušit</button></a>
            <button type="submit" name="createarticle" class="btn btn-success">Potvrdit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>