<?php
if (!isset($_SESSION['isAdminLoggedIn']) || $_SESSION['isAdminLoggedIn'] != 1) {
    redirect('welcome');
}
?>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url("panel/plugins/bootstrap/bootstrap.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("panel/font-awesome/css/font-awesome.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("panel/plugins/pace/pace-theme-big-counter.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("panel/css/style.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("panel/css/mystyle.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("panel/css/main-style.css"); ?>" rel="stylesheet" />
    <link href="<?php echo base_url("panel/plugins/dataTables/dataTables.bootstrap.css"); ?>" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url("panel/plugins/morris/morris-0.4.3.min.css"); ?>" rel="stylesheet" />

    <style type="text/css">
        /* Sticky footer styles
        -------------------------------------------------- */
        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            height: 40px;
            color: #ffffff;
            font-weight: normal;
            background-color: #014279;
        }
    </style>

