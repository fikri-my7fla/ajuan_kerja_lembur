
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- UNTUK MENAMPILKAN TITLE -->
  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  
  <link href="<?= base_url('assets/members/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" 
  rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/members/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/members/'); ?>css/preloader.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/members/'); ?>css/bootstrap-select.css">
  <link rel="stylesheet" href="<?= base_url('assets/members/'); ?>css/animate.css">
  
  <link rel="stylesheet" href="<?= base_url('assets/members/'); ?>css/jquery.signaturepad.css">

  <style type="text/css">
			#btnSaveSign {
				color: #fff;
				background: #f99a0b;
				padding: 5px;
				border: none;
				border-radius: 5px;
				font-size: 20px;
				margin-top: 10px;
			}
			#signArea{
				width:304px;
				margin: 50px auto;
			}
			.sign-container {
				width: 60%;
				margin: auto;
			}
			.sign-preview {
				width: 150px;
				height: 50px;
				border: solid 1px #CFCFCF;
				margin: 10px 5px;
			}
			.tag-ingo {
				font-family: cursive;
				font-size: 12px;
				text-align: left;
				font-style: oblique;
			}
		</style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">