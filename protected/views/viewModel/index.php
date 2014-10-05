<?php
/* @var $this ViewModelController */


$this->breadcrumbs=array(
	'View Model',
);


$baseUrl = Yii::app()->baseUrl. DIRECTORY_SEPARATOR. "/protected/viewModel";
$cs = Yii::app()->getClientScript();



?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

 
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>



    Controller Name:
    <input type="text" id="controller" />
    <input id="sub" type="submit" text="Test" />
    
    <br/>
    Data:
    <input type="text" id="data" />
    
    
    <script>
  
$("#sub").click(function () { 
            $.ajax({
                type: "GET",
                url: './api/' + $("#controller").val() + '/',           
                success: function (response) {
                    
                    $('#data').val(response)
                }
                })
            });
 </script>