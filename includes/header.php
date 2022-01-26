<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CRoboto" rel="stylesheet">
  <meta http-equiv="x-ua-compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $get_logo_title_query = "select * from logo_title where id=1";

$prepare_get = $con->prepare($get_logo_title_query);
$run_get = $prepare_get->execute();

$row_get = $prepare_get->fetch();

$site_title = $row_get['site_title'];

$site_logo = $row_get['site_logo'];

?>

  <link rel="shortcut icon" href="images/<?php echo $site_logo ?>" type="image/png">
  <title><?php echo $site_title ?></title>
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/backend.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">

  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">