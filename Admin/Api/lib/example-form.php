<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title></title>
 <style type="text/css">
 .paginate {
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .7em;
 }
 
 a.paginate {
 	border: 1px solid #000080;
 	padding: 2px 6px 2px 6px;
 	text-decoration: none;
 	color: #000080;
 }
 
 
 a.paginate:hover {
 	background-color: #000080;
 	color: #FFF;
 	text-decoration: underline;
 }
 
 a.current {
 	border: 1px solid #000080;
 	font: bold .7em Arial,Helvetica,sans-serif;
 	padding: 2px 6px 2px 6px;
 	cursor: default;
 	background:#000080;
 	color: #FFF;
 	text-decoration: none;
 }
 
 span.inactive {
 	border: 1px solid #999;
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .7em;
 	padding: 2px 6px 2px 6px;
 	color: #999;
 	cursor: default;
 }
 
 table {
 	margin: 8px;
 }
 
 th {
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .7em;
 	background: #666;
 	color: #FFF;
 	padding: 2px 6px;
 	border-collapse: separate;
 	border: 1px solid #000;
 }
 
 td {
 	font-family: Arial, Helvetica, sans-serif;
 	font-size: .7em;
 	border: 1px solid #DDD;
 }
 </style>
 <script>
 function hilite(elem)
 {
 	elem.style.background = '#FFC';
 }
 
 function lowlite(elem)
 {
 	elem.style.background = '';
 }
 </script>
 </head>
 
 <body>  
<?
 $host = '';
 $user = '';
 $pwd = '';
 $db = '';
 $connection = mysql_connect($host,$user,$pwd) or die("Could not connect");
 mysql_select_db($db) or die("Could not select database");
 $form_query = "SELECT DISTINCT Continent FROM Country ORDER BY Continent ASC";
 $form_result = mysql_query($form_query) or die(mysql_error());
?> 
 <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"> <select name="tb1" onchange="submit()"> <option>Please select a continent</option>
<?
while($row = mysql_fetch_assoc($form_result))
 {
 	echo "<option>$row[Continent]</option>\n";
 } 
?>
  </select> </form> 
<?php
 if(!empty($_REQUEST[tb1])) {
 include('paginator.class.php');
 
 $query = "SELECT COUNT(*) FROM City,Country WHERE City.CountryCode = Country.Code AND Country.Continent = '$_REQUEST[tb1]'";
 $result = mysql_query($query) or die(mysql_error());
 $num_rows = mysql_fetch_row($result);
 
 $pages = new Paginator;
 $pages->items_total = $num_rows[0];
 $pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
 $pages->paginate();
 
 echo $pages->display_pages();
 echo "<span class=\"\">".$pages->display_jump_menu().$pages->display_items_per_page()."</span>";
 
 $query = "SELECT City.Name,City.Population,Country.Name,Country.Continent,Country.Region FROM City,Country WHERE City.CountryCode = Country.Code AND Country.Continent = '$_REQUEST[tb1]' ORDER BY City.Name ASC $pages->limit";
 $result = mysql_query($query) or die(mysql_error());
 
 echo "<table>";
 echo "<tr><th>City</th><th>Population</th><th>Country</th><th>Continent</th><th>Region</th></tr>";
 while($row = mysql_fetch_row($result))
 {
 	echo "<tr onmouseover=\"hilite(this)\" onmouseout=\"lowlite(this)\"><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>\n";
 }
 echo "</table>";
 
 echo $pages->display_pages();
 echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
 echo "<p class=\"paginate\">SELECT * FROM table $pages->limit (retrieve records $pages->low-$pages->high from table - $pages->items_total item total / $pages->items_per_page items per page)";
 } ?>
 </body>
 </html>