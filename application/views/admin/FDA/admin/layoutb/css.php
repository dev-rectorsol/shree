<?php
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('optimum/admin') ?>/assets/images/favicon.png">
    <title><?php echo $system_title." || ".$system_name ?></title>
    <!-- Custom CSS -->
        <link href="<?php echo base_url('optimum/admin') ?>/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">

    <link href="<?php echo base_url('optimum/admin') ?>/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="<?php echo base_url('optimum/admin') ?>/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('optimum/admin') ?>/assets/extra-libs/multicheck/multicheck.css">
    <link href="<?php echo base_url('optimum/admin') ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url('optimum/admin') ?>/assets/extra-libs/DataTables/dataTables.checkboxes.css" rel="stylesheet"> -->
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('optimum/admin') ?>/dist/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url('optimum/admin') ?>/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url('optimum/admin') ?>/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <!-- js file -->
    <script src="<?php echo base_url('optimum/admin') ?>/assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('optimum/admin') ?>/assets/libs/jquery/dist/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>.tip {
    display: inline-block;
    font-size: 18px;
    margin: 0 4px;
}
#overlay {
  font-family: monospace;
  width: 100%;
  height: 100%;
  background: #f0f0f0;
  position:  absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 999;
  display: none;
}
div#overlay img {
    position: relative;
    top: 50%;
    left: 50%;
}
</style>

</head>

<body>
