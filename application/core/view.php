<?php
/*метод generate предназначен для формирования вида. В него передаются следующие параметры:
1.	$content_view — виды отображающие контент страниц;
2.	$template_view — общий для всех страниц шаблон;
3.	$data — массив, содержащий элементы контента страницы. Обычно заполняется в модели.

Функцией include динамически подключается общий шаблон (вид), внутри которого будет встраиваться вид для отображения контента конкретной страницы.*/
class View
{
	//public $template_view; // здесь можно указать общий вид по умолчанию.
	
	function generate($content_view, $template_view, $data = null)
	{
		/*
		if(is_array($data)) {
			// преобразуем элементы массива в переменные
			extract($data);
		}
		*/
		
		include 'application/views/'.$template_view;
	}
}
?>