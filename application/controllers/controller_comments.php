<?php
class Controller_Comments extends Controller
{

	function __construct()
	{
		$this->model = new Model_Comments();
		$this->view = new View();
		$this->template ='template_view.php';
	}
	
	function action_index()
	{

		$data['id_news']=$_GET['id'];
		$data['news'] = $this->model->get_comments($data['id_news']);
//var_dump($data);
		$this->view->generate('comments_view.php', $this->template,$data);
	}

	function action_add(){
		if ($_POST){
			$data=$_POST;
			$data['id_user']=$_SESSION["user"]["id"];		


			if ($this->model->add($data)){
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'news');
			} else {
				$data['mess']="NOOOO";
				$this->view->generate('comments_view.php', $this->template,$data);
			}
		} 
		else {
			$this->view->generate('comments_view.php', $this->template);
		}
	}

function action_del(){
		if ($_GET){
			if ($this->model->del($_GET['id'])){
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'comments/index/?id='.$_GET['news']);
			} 
		}else {
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'comments');
			}

		}


/*
	function action_del(){
		if ($_GET){
			if ($this->model->del($_GET['id'])){
				$id="Успешно удалено";
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'portfolio');
			} 
		}else {
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'portfolio');
			}

		}

	function action_update(){
	if ($_GET){
			if ($data=$this->model->update($_GET['id'])){
				$this->view->generate('portfolio_view_update.php', $this->template, $data);				
			} 
		}else {
			echo "no";				
			}
		}


	function action_save(){
	if ($_POST){
		if ($data=$this->model->save($_POST)){
			$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'portfolio');			
			} 
		}else {
			echo "no";				
			}
		}

*/

}
?>