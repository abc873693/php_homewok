<html>
<head>
<style type="text/css">
	.table_titles, .table_cells_odd, .table_cells_even {
			padding-right: 20px;
			padding-left: 20px;
			color: #000;
	}
	.table_titles {
		color: #FFF;
		background-color: #666;
	}
	.table_cells_odd {
		background-color: #CCC;
	}
	.table_cells_even {
		background-color: #FAFAFA;
	}
	table {
		border: 3px solid #333;
	}
	body { font-family: "Trebuchet MS", Arial; }
	.table_out{
	border-top:40px #D6D3D6 solid; 
	width:0px;
	height:0px;
	border-left:80px #BDBABD solid;
	position:relative;
	}
	b{font-style:normal;display:block;position:absolute;top:-40px;left:-50px;width:55x;}
	em{font-style:normal;display:block;position:absolute;top:-20px;left:-80px;width:35x;}
	.t1{background:#BDBABD;}
</style>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="4">
  <tr>
  <?php
	for($i=0;$i<10;$i++)
	{
		if($i==0)
		{
			echo '<th style = width:80px;><div class=table_out><b>被乘數</b><em>乘數</em></div></th>';
		}
		else
		{
			echo '<td class=table_titles>'.$i.'</td>';
		}
	}
  ?>
  </tr>
<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$oddrow=true;
for($i=1;$i<10;$i++)
{
	if ($oddrow)
	{
		$css_class=' class="table_cells_odd"';
	}
	else
	{
		$css_class=' class="table_cells_even"';
	}
	ex($i,$css_class);
	$oddrow = !$oddrow;
}
function ex($i,$css_class)
{
	echo '<tr>';
	for($j=0;$j<10;$j++)
	{
		if($j==0)
		{
			echo '<td class=table_titles>'.$i.'</td>';
		}
		else
		{
			echo '<td'.$css_class.">$j × $i = ".$i*$j.'</td>';
		}
	}
	echo '</tr>';
}
?>
</body>
</html>