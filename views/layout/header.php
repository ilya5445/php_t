<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$pageData['title']?></title>

    <link rel="stylesheet" href="/css/app.css">
    <style>
        p{padding:10px;}
    </style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Главная</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="/create">Создать задачу</a></li>
                <?php if(isset($_SESSION['username'])) { if($_SESSION['username'] == 'admin'){ ?>
                	<?$_GET['sort'] = 'name';?>
                    <li><a href="?<?=http_build_query($_GET)?>">by name</a></li>
                	<?$_GET['sort'] = 'email';?>
                    <li><a href="?<?=http_build_query($_GET)?>">by email</a></li>
                	<?$_GET['sort'] = 'id';?>
                    <li><a href="?<?=http_build_query($_GET)?>">by ID</a></li>
                    <li><a href="/admin/logout">Выход</a></li>
                <?php }} else { ?>
                    <li><a href="/admin">Вход</a></li>
                <?php } ?>
                </ul>
			</div>
		</div>
	</nav>