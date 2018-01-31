<?php
class Controller_Portfolio extends Controller
{

	function __construct()
	{
		$this->model = new Model_Portfolio();
		$this->view = new View();
		$this->template ='template_view.php';
	}
	
	function action_index()
	{
		$data = $this->model->get_data();	//В переменную data записывается массив, возвращаемый методом get_data

		/*Далее эта переменная передается в качестве параметра метода generate, в который также передаются: имя файла с общим шаблон и имя файла, содержащего вид c контентом страницы*/
		$this->view->generate('portfolio_view.php', $this->template, $data);

	}

	function action_add(){
		if ($_POST){
			if ($this->model->add($_POST)){
				$data="Успешно добавлено";
				$this->view->generate('portfolio_view_add.php', $this->template, $data);

		} 
	}else {
			$this->view->generate('portfolio_view_add.php', $this->template);
		}
}

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



}
?>