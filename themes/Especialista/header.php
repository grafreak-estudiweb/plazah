<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Bootstrap CSS -->
  <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/bc2051655c.js" crossorigin="anonymous"></script>
  <?php if (is_home() or is_archive()) { ?>
    <title>Especialista</title>
  <?php } ?>
  <?php wp_head(); ?>
</head>

<?php
$class = (is_home() || is_archive() ? "bg-f5" : "");
?>

<body data-theme="default" <?php body_class($class); ?>>
  <?php wp_body_open(); ?>