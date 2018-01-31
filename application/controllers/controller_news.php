<?php

class Controller_News extends Controller
{


	function __construct()
	{
		$this->model = new Model_News();
		$this->view = new View();
		$this->template ='template_view.php';
	}
	function action_index()
	{	/* В метод generate экземпляра класса View передаются имена файлов общего шаблона и вида c контентом страницы.*/	
		$data = $this->model->get_news();
		$this->view->generate('news_view.php', 'template_view.php', $data);

	}

		function action_add(){
			
		if ($_POST){
			if ($this->model->add_news($_POST)){
				$data="Успешно добавлено";
				$this->view->generate('news_view_add.php', $this->template, $data);

		} 
	}else {
			$this->view->generate('news_view_add.php', $this->template);
		}
}


function action_del(){
		if ($_GET){
			if ($this->model->del($_GET['id'])){
				echo "ok";
				$id="Успешно удалено";
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'news');
			} 
		}else {
			echo "no";
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'news');
			}

		}


	function action_update(){
	if ($_GET){
			if ($data=$this->model->update($_GET['id'])){
				$this->view->generate('news_view_update.php', $this->template, $data);				
			} 
		}else {
			echo "no";				
			}
		}


	function action_save(){
	if ($_POST){
		if ($data=$this->model->save($_POST)){
			$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'news');			
			} 
		}else {
			echo "no";				
			}
		}


}

?>