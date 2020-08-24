<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>

	<style>
		div.logo {
			height: 200px;
			width: 155px;
			display: inline-block;
			opacity: 0.08;
			position: absolute;
			top: 2rem;
			left: 50%;
			margin-left: -73px;
		}

		body {
			height: 100%;
			background: #fafafa;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #777;
			font-weight: 300;
		}

		h1 {
			font-weight: lighter;
			letter-spacing: 0.8;
			font-size: 3rem;
			margin-top: 0;
			margin-bottom: 0;
			color: #222;
		}

		.wrap {
			max-width: 1024px;
			margin: 5rem auto;
			padding: 2rem;
			background: #fff;
			text-align: center;
			border: 1px solid #efefef;
			border-radius: 0.5rem;
			position: relative;
		}

		pre {
			white-space: normal;
			margin-top: 1.5rem;
		}

		code {
			background: #fafafa;
			border: 1px solid #efefef;
			padding: 0.5rem 1rem;
			border-radius: 5px;
			display: block;
		}

		p {
			margin-top: 1.5rem;
		}

		.footer {
			margin-top: 2rem;
			border-top: 1px solid #efefef;
			padding: 1em 2em 0 2em;
			font-size: 85%;
			color: #999;
		}

		a:active,
		a:link,
		a:visited {
			color: #dd4814;
		}
	</style>
</head>

<body>
	<div class="wrap">
		<h1>404 - File Not Found</h1>

		<p>
			<?php if (!empty($message) && $message !== '(null)') : ?>
				<?= esc($message) ?>
			<?php else : ?>
				Sorry! Cannot seem to find the page you were looking for.
			<?php endif ?>
		</p>
	</div>
</body>

</html> -->


<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404</title>
	<link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.css">

	<link rel="shortcut icon" href="<?= base_url('assets') ?>/images/favicon.svg" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/css/app.css">
</head>

<body>
	<div id="error" style="background-image: url('<?= base_url('assets/images/404.png'); ?>'); background-color: #cccccc;">
		<div class="container text-center pt-32">
			<?php if (!empty($message) && $message !== '(null)') : ?>
				<h1><?= esc($message) ?></h1>
			<?php else : ?>
				<p>Sorry! Cannot seem to find the page you were looking for.</p>
			<?php endif ?>
			<a href="<?= base_url('/') ?>" class='btn btn-primary'>Go Home</a>
		</div>

		<div class="footer pt-32">
			<p class="text-center">Copyright &copy; Voler 2020</p>
		</div>
	</div>
</body>

</html>