<?php
session_start();

require 'includes/database.php';

/*
  ÚČTY
*/

// Tvorba účtu
if(isset($_POST['createaccount']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['confirmpassword'];

  if($password === $cpassword)
  {
    $query = "INSERT INTO users (username,password) VALUES ('$username','$password')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
      $_SESSION['success'] = "Uživatel byl úspěšně vytvořen";
      header('Location: accounts.php');
    }
    else
    {
      $_SESSION['status'] = "Tvorba uživatele byla zrušena";
      header('Location: accounts.php');
    }
  }
  else
  {
    $_SESSION['status'] = "Hesla se neshodují";
    header('Location: accounts.php');
  }
}

// Úprava účtu
if(isset($_POST['updateaccount']))
{
  $id = $_POST['edit_id'];
  $username = $_POST['edit_username'];
  $password = $_POST['edit_password'];

  $query = "UPDATE users SET username='$username', password='$password' WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Údaje byly úspěšně změněny";
    header('Location: accounts.php');
  }
  else
  {
    $_SESSION['status'] = "Změna údajů se nezdařila";
    header('Location: accounts.php');
  }
}

// Odstranění účtu
if (isset($_POST['delete_account']))
{
  $id = $_POST['delete_account_id'];

  $query = "DELETE FROM users WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if ($query_run)
  {
    $_SESSION['success'] = "Uživatel byl úspěšně odstraněn";
    header('Location: accounts.php');
  }
  else
  {
    $_SESSION['status'] = "Při odstraňování uživatele se vyskytla chyba";
    header('Location: accounts.php');
  }
}

// Přihlášení
if(isset($_POST['login_button']))
{
  $login_username = $_POST['username'];
  $login_password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username='$login_username' AND password='$login_password'";
  $query_run = mysqli_query($connection, $query);

  if(mysqli_fetch_array($query_run))
  {
    $_SESSION['username'] = $login_username;
    header('Location: index.php');
  }
  else
  {
    $_SESSION['status'] = 'Jméno nebo heslo je nesprávné';
    header('Location: login.php');
  }
}

/*
  ČLÁNKY
*/

// Tvorba článku
if(isset($_POST['createarticle']))
{
  $id = $_POST['article_id'];
  $date = $_POST['article_date'];
  $title = $_POST['article_title'];
  $content = $_POST['article_content'];

  $query = "INSERT INTO articles (date,title,content) VALUES ('$date','$title','$content')";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Článek byl úspěšně vytvořen";
    header('Location: articles.php');
  }
  else
  {
    $_SESSION['status'] = "Tvorba článku se nezdařila";
    header('Location: articles.php');
  }
}

// Úprava článku
if(isset($_POST['updatearticle']))
{
  $id = $_POST['edit_id'];
  $date = $_POST['edit_date'];
  $title = $_POST['edit_title'];
  $content = $_POST['edit_content'];

  $query = "UPDATE articles SET date='$date', title='$title', content='$content' WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Článek byl úspěšně upraven";
    header('Location: articles.php');
  }
  else
  {
    $_SESSION['status'] = "Úprava článku se nezdařila";
    header('Location: articles.php');
  }
}

// Odstranění článku
if (isset($_POST['delete_article']))
{
  $id = $_POST['delete_article_id'];

  $query = "DELETE FROM articles WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if ($query_run)
  {
    $_SESSION['success'] = "Článek byl úspěšně odstraněn";
    header('Location: articles.php');
  }
  else
  {
    $_SESSION['status'] = "Při odstraňování článku se vyskytla chyba";
    header('Location: articles.php');
  }
}

/*
  GALERIE
*/

// Přidávání obrázku
if(isset($_POST['creategallery']))
{
  $id = $_POST['gallery_id'];
  $image = $_POST['gallery_image'];

  $query = "INSERT INTO gallery (date,title,content) VALUES ('$image')";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Obrázek byl úspěšně přidán";
    header('Location: gallery.php');
  }
  else
  {
    $_SESSION['status'] = "Přidání obrázku se nezdařilo";
    header('Location: gallery.php');
  }
}

// Úprava obrázku
if(isset($_POST['updategallery']))
{
  $id = $_POST['edit_gallery_id'];
  $image = $_POST['edit_image'];

  $query = "UPDATE gallery SET image='$image' WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Obrázek byl úspěšně upraven";
    header('Location: gallery.php');
  }
  else
  {
    $_SESSION['status'] = "Úprava obrázku se nezdařila";
    header('Location: gallery.php');
  }
}

// Odstranění obrázku
if (isset($_POST['delete_gallery']))
{
  $id = $_POST['delete_gallery_id'];

  $query = "DELETE FROM gallery WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if ($query_run)
  {
    $_SESSION['success'] = "Obrázek byl úspěšně odstraněn";
    header('Location: gallery.php');
  }
  else
  {
    $_SESSION['status'] = "Při odstraňování obrázku se vyskytla chyba";
    header('Location: gallery.php');
  }
}

/*
  ZÁHLAVÍ
*/

// Úprava záhlaví
if(isset($_POST['update_header']))
{
  $id = $_POST['edit_header_id'];

  $image = $_POST['edit_header_image'];

  $query = "UPDATE header SET image='$image' WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Záhlaví bylo úspěšně upraveno";
    header('Location: header.php');
  }
  else
  {
    $_SESSION['status'] = "Úprava záhlaví se nezdařila";
    header('Location: header.php');
  }
}

/*
  STATITIKY
*/

// Úprava statistik
if(isset($_POST['update_gallery']))
{
  $id = '1';

  $content = $_POST['edit_content'];

  $query = "UPDATE stats SET content='$content' WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if($query_run)
  {
    $_SESSION['success'] = "Statistiky byly úspěšně upraveny";
    header('Location: stats.php');
  }
  else
  {
    $_SESSION['status'] = "Úprava statistik se nezdařila";
    header('Location: stats.php');
  }
}
?>