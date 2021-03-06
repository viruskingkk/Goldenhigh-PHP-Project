<?php
set_include_path('../include/');
$includepath = true;

require_once('../Connections/SQL.php');
require_once('../config.php');
require_once('view.php');

if(!isset($_SESSION['Center_Username']) or $_SESSION['Center_UserGroup'] != 'admin'){
	header("Location: ../index.php");
	exit;
}

if(isset($_POST['status'])&&isset($_POST['ptime'])&&abs($_POST['status'])>=0&&abs($_POST['ptime'])>=0){
	$SQL->query("DELETE FROM `notice` WHERE `status` = '%d' AND `ptime` < '%s'",array(abs($_POST['status']),date('Y-m-d H:i:s',time()-60*60*24*30*abs($_POST['ptime']))));
	$_GET['delok']=true;
}

$view = new View('../view/new_theme.html','../include/admin_nav.php',$center['site_name'],'通知管理',true);
$view->addScript("https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js");
$view->addScript("../include/js/channel.js");
?>
<?php if(isset($_GET['delok'])){ ?>
	<div class="alert alert-success">刪除成功！</div>
<?php } ?>
<div class="main">
	<h2 class="subtitle">通知管理</h2>
	<form class="form-horizontal" id="form1" name="form1" action="notice.php" method="POST">
		<div class="control-group">
		<label class="control-label" for="ptime">時間：</label>
		<div class="controls">
				<select name="ptime" id="ptime" class="input-large">
					<option value="12">一年前</option>
					<option value="9">九個月前</option>
					<option value="6">六個月前</option>
					<option value="3">三個月前</option>
					<option value="2">二個月前</option>
					<option value="1">一個月前</option>
					<option value="0">不限</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="status">狀態：</label>
			<div class="controls">
				<select name="status" id="status" class="input-large">
					<option value="0">未讀</option>
					<option value="1">已讀</option>
				</select>
			</div>
		</div>
		<div class="form-actions">
			<input class="btn btn-danger" type="button" onClick="if(window.confirm('確定刪除？')){document.getElementById('form1').submit();}" value="刪除">
		</div>

	</form>
</div>
<?php
$view->render();
?>