<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new model_admin();
		$this->view = new View();
		$this->template ='template_view.php';
	}
	

	function action_index()
	{		
		$this->view->generate('admin_view.php', 'template_view.php');
	}

	function action_checkin()
	{		
		if ($_POST)
		{
			if (($_POST['password']==$_POST['pass']) && (!$this->model->name($_POST['name'])))
			{
				if ($this->model->checkin($_POST))
				{
					$data="<h3>Регистрация прошла успешно!</h3>";
					$this->view->generate('admin_view_checkin.php', $this->template, $data);
				} 
			}
		else
			{
			$data="<h3>Ошибка регистрации! Попробуйте снова. </h3> ";
			$this->view->generate('admin_view_checkin.php', 'template_view.php', $data);
			}
		}
	else 
		{
		$this->view->generate('admin_view_checkin.php', 'template_view.php');
		}
	}	

	function action_adm()
	{		
		$data = $this->model->adm();
		$this->view->generate('adm_view.php', $this->template, $data);
	}

	function action_del()
	{
		if ($_GET)
		{
			if ($this->model->del($_GET['id']))
			{
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'admin/adm');
			} 
		}
		else 
		{
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'admin/adm');
		}
	}

	function action_update()
	{
		if ($_GET)
		{
			if ($data=$this->model->update($_GET['id']))
			{
				$this->view->generate('adm_view_update.php', $this->template, $data);				
			} 
		}
		else 
		{
			echo "no";				
		}
	}


	function action_save()
	{
		if ($_POST)
		{
			if ($data=$this->model->save($_POST))
			{
				$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
				header('Location:'.$host.'admin/adm');			
			} 
		}
		else 
		{
			echo "no";				
		}
	}




	public function action_autorize()
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		if ($_POST && $_SESSION["user"] =$this->model->autorize($_POST)) 
		{
			header('Location:'.$host.'main');
		} 
		else 
		{
			$data="Ошибка ввода";
			$this->view->generate('admin_view.php', 'template_view.php',$data);
		}
	}



	public function action_exit()
	{
		unset($_SESSION['user']);
		session_write_close();
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('Location:'.$host.'Main');
	}


}
?>


