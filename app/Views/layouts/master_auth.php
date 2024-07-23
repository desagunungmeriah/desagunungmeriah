<?php

use App\Models\ConfigwebModel;

$web = new ConfigwebModel();
$web = $web->first();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://eduadmin-template.multipurposethemes.com/bs5/images/favicon.ico">

	<title><?= $web->title ?> - <?= $title; ?></title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/vendors_css.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.3/css/all.css">
	<!-- Style-->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/skin_color.css">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(/master.png)">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<img src="<?= base_url('assets/images/logo-kab.png') ?>" alt="logo" width="85px" height="85px">
								<?php
								$uri = service('uri');
								?>
								<?php if ($uri->getSegment(3) === "lupapassword") { ?>
									<h4>Lupa Password</h4>
									<p class="mb-0">Silahkan masukkan email anda.</p>
								<?php } else if ($uri->getSegment(3) === "resetPassword") { ?>
									<p class="mb-0">Silahkan reset kata sandi.</p>
								<?php } else { ?>
									<p class="mb-0 mt-4">Masukkan Email/Username untuk Melanjutkan Login.</p>

								<?php } ?>
							</div>
							<div class="p-40">
								<?= $this->renderSection('content') ?>
								<?php if ($uri->getSegment(3) === "lupapassword") { ?>
								<?php } else if ($uri->getSegment(3) === "resetPassword") { ?>
								<?php } else { ?>

							</div>
						<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>


	<!-- Vendor JS -->
	<script src="<?= base_url() ?>/assets/js/vendors.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/pages/chat-popup.js"></script>
	<script src="<?= base_url() ?>/assets/icons/feather-icons/feather.min.js"></script>
	<script>
		const passwordInput = document.querySelector('input[name="password"]');
		const togglePasswordButton = document.getElementById('togglePassword');

		togglePasswordButton.addEventListener('click', function() {
			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
			} else {
				passwordInput.type = 'password';
			}
		});
	</script>
</body>

</html>