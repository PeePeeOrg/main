<?php
require_once('phps/function.php');
if(!isset($_GET['city'])){$name= 'Volgograd';}else{$name = addslashes(strip_tags(trim($_GET['city'])));}
$true_add=false;
$city = GetIDforName($name);
?>

<!DOCTYPE HTML> 
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Карта туалетов города <?=$city['name']?> – PeePee.org.ru</title>
	<meta name="description" content="Карта туалетов города <?=$city['name']?> – PeePee.org.ru">
	<meta name="keywords" content="Toilets,Туалеты,Карта,Map,где,<?=$city['eng']?>,Russia">
	<link rel="stylesheet" type="text/css" href="css/map.css">
	<link rel="image_src" href="img/logo_black.png"/>
	<script type="text/javascript" src="http://maps.api.2gis.ru/1.0"></script>
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
	<script type="text/javascript" src="http://yandex.st/share/share.js" charset="utf-8"></script>
  <script src="http://peepee.org.ru/js/q.js"></script>
	<script type="text/javascript">
var cityphp="<?=$city['label']?>";
	</script>
	<script src="js/geo.js"></script>
</head>
<body>
	<div class="header">
		<div class="leftheader">
			<img src="img/logo.png" height="50" style="margin-left: 60px;"/>
		</div>
		<div class="rightheader">
			Город: 
			<select id="cityselect" disabled="disabled">
				<option value="mosc">Москва</option>
				<option value="piter">Санкт Петербург</option>
        <option value="vlg">Волгоград</option>
				<option value="vlj">Волжский</option>
			</select>
			<span style="margin: 0px 15px;"></span>
			<a class="headerlink" href="javascript:initiateAdd();">Добавить в базу</a>
		</div>
	</div>

	<div class="menu">
		<div class="menuitem">
			<div class="menuitemheader">Поиск по критериям<div class="menuitemheaderexpand"></div></div>
			<div class="menuitemcontent">
				<form>
					<input type="hidden" name="ok"/>
					<input type="checkbox" id="showfree" name="showfree" checked="true"><span class="inputcb"> Общественные бесплатные</span></input><br/>
					<input type="checkbox" id="showpay" name="showpay" checked="true"><span class="inputcb"> Общественные платные</span></input><br/>
					<input type="checkbox" id="showcourt" name="showcourt" checked="true"><span class="inputcb"> В кафе, ресторанах и т.д.</span></input><br/>
					<input type="checkbox" id="showorg" name="showorg" checked="true"><span class="inputcb"> В учреждениях</span></input><br/>
				
					<p align="center">
					Минимальный комфорт:
						<select id="mincomf" name="mincomf">
							<option value="any" id="firstmincomf">Любой</option>
							<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
						</select>
					</p>
				</form>
				<p align="center" style="margin: 0px; padding: 0px;">
					<a href="javascript:clearFilter();">Очистить фильтр</a>
				</p>
			</div>
		</div>	
		
		<div class="menuitem" id="addmenu" style="display: none;">
			<div class="menuitemheader">Новая запись в базе данных</div>
			<div class="menuitemcontent" style="display: block;">
				<span id="addLon">Выберите местоположение туалета на карте.</span><br/>
				<span id="addLat"></span><br/><br/>
				Дополнительная информация (как найти, цена, комфорт, доступность):<br/>
				<textarea id="commentAdd"></textarea>
				<input type="submit" onClick="finishAdd(true);" value="Добавить" style="margin-left: 50px;"/>
				<input type="submit" onClick="finishAdd(false);" value="Отмена"/>
			</div>
		</div>

	<!-- Map -->
	<div id="map"></div>

</body>
</html>
