<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $meta['title'] ?></title>
	<meta name="description" content="<?= $meta['desc'] ?>">
	<meta name="keywords" content="<?= $meta['keywords'] ?>">
	<link href="/bootstrap5/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link href="/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php if($navbar): ?>
<header>
	<nav class="navbar bg-light">
	    <?php foreach ($navbar as $bar): ?>
				<div class="container-fluid">
					<span class="navbar-brand mb-0 h1" id="<?= $bar['id']; ?>"><?= $bar['title'] ?></span>
				</div>
			<?php endforeach; ?>
	</nav>
</header>
<?php endif; ?>
<?= $content ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="/bootstrap5/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<?php foreach ($scripts as $scr ){
	echo $scr;
} ?>
</body>
</html>