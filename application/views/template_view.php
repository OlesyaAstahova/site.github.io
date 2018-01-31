<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
	<body>
		<div id="fon">
			<div id="header">
				 <img id="logo" src="/images/cap.png" align="left"> 
	<center><h1>ПРАЗДНИЧЕК</h1></center> 
		<div id="V">
			<?php if (isset($_SESSION["user"])) {
					?> 
					<a id="avt" href="/admin/exit"><?php echo $_SESSION["user"]["name"]; ?> Выход </a>
					<?php if($_SESSION["user"]["role"]==2){ ?>
					<a id="avt" href="/admin/adm"> Админ раздел </a><br><?php }?>
					<?php	
				} else { ?>
				<a href="/admin">Вход в систему</a><br>
				<?php } ?>
		</div>
			<div id="menu">
				<br>
					<ul>
						<li><a href="/">Главная</a></li>
						<li><a href="/services">Услуги</a></li>
						<li><a href="/portfolio">Портфолио</a></li>
						<li><a href="/contacts">Контакты</a></li>
						<li><a href="/news">Новости</a></li>
					</ul>
				</div>
			</div>
			<div id="page">
				<div id="line">
					<div class="box">
						<h3>Дополнительные услуги</h3>
						<p align="justify">
							<ul>
							<li><big><b>Пиротехнический фонтан</b></big></li>
							Сделать яркий акцент на важных момента вашего праздника поможет пиротехнический фонтан. Торт, путь героев праздника к месту празднования, первый танец молодоженов и многие другие моменты можно сделать еще ярче.
							<li><big><b>Пирамида шампанского</b></big></li>
							 Как показывает практика, пирамида из шампанского становится своеобразным центром торжества, возле которого все хотят сфотографироваться. Наши специалисты быстро соорудят конструкцию из бокалов, которая обязательно приведет в восторг всех присутствующих.
							<li><big><b>Запуск светящихся шаров</b></big></li>
							Запуск шаров – это лучший способ дать понять всем вокруг, что только что произошло главное событие в жизни двух людей и мощный финальный аккорд вашей свадьбы. 
							<li><big><b>Сувениирные бутылки</b></big></li>
							Хотите порадовать гостей оригинальным и запоминающимся сюрпризом? Простой и недорогой способ сделать это – заказать необычные этикетки на бутылки шампанского.
						</ul>
						</p>
					</div>
				<div class="box"><br><br>
						<h3>Основное меню</h3>
						<ul>
							<li><a href="/">Главная</a></li>
							<li><a href="/services">Услуги</a></li>
							<li><a href="/portfolio">Портфолио</a></li>
							<li><a href="/contacts">Контакты</a></li>
							<li><a href="/news">Новости</a></li>
						</ul>
				</div>
			</div>
			<div id="content">
				<div class="box">
	<?php include 'application/views/'.$content_view; ?>
				</div>
			</div>
				<br class="clear" />
		</div>
			<div id="page-bottom">
					<h3>Наши контакты</h3>
					<li>VK: https://vk.com/qwertyuio</li>
					<li>Skype id: qwertyuio</li>
					<li>Email: qwertyuio@gmail.com</li><br>
			</div>
		</div>
		<div id="footer">
			<a href="/">Праздничек</a> &copy; 2017</a>
		</div>
	</body>
</html>