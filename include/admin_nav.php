<?php if((isset($_SESSION['Center_Username']))&&($_SESSION['Center_UserGroup']=='admin')){ ?>
	<li><a href="index.php">後臺首頁</a></li>
	<li class="dropdown">
		<a href="member.php" data-target="#" data-toggle="dropdown">會員管理 ▼</a>
		<ul class="dropdown-menu">
			<li><a href="member.php">會員管理</a></li>
			<li><a href="searchmember.php">會員搜尋</a></li>
		</ul>
	</li>
	<li><a href="chat.php">聊天管理</a></li>
	<li class="dropdown">
		<a href="forum.php" data-target="#" data-toggle="dropdown">論壇管理 ▼</a>
		<ul class="dropdown-menu">
			<li><a href="forum.php">論壇管理</a></li>
			<li><a href="forummerge.php">區塊合併</a></li>
		</ul>
	</li>
<li><a href="../admin_ticket.php">支援表單</a></li>    
<li><a href="notice.php">通知管理</a></li>
	<li><a href="editconfig.php">系統設定</a></li>
	<li><a href="../member.php">會員中心</a></li>
<?php } ?>