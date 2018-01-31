<?php
class Controller_Main extends Controller
{
	function action_index()
	{	
		/* В метод generate экземпляра класса View передаются имена файлов общего шаблона и вида c контентом страницы.*/
		$this->view->generate('main_view.php', 'template_view.php');
	}
}
?>