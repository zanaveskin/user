<?php 
	require 'db.php';
	require 'template.php';
	require 'msg.php';

	$data = $_POST;
	$msg = new Msg ();

	if (isset ($data['do_login'])) {
		$user = R::findOne ('users', 'login = ?', array ($data['login']));
		if ($user) {
			if (password_verify ($data['password'], $user->password)) {
				$_SESSION['logged_user'] = $user;
				echo '<div style="color:green;">Вы авторизованы!<br/> Можете перейти на <a href="/">главную</a> страницу.</div><hr>';
			} else {
				$errors[] = 'Неверно введен пароль!';
			}
		} else {
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		
		if (!empty ($errors)) {
			echo '<div id="errors" style="color:red;">' . array_shift ($errors). '</div><hr>';
		}
	}

function login_form () {

	$msg = new Msg ();
	$s = '
	<form action="login.php" method="POST" role="form" class="form-horizontal">
		<div class="form-group">
		<label class="col-sm-4 control-label">' . $msg->_LBL_LOGIN[$msg->lang] . '</label>
		<div class="col-sm-4"><input type="text" name="login" class="form-control" value="' . @$data['login'] . '"></div>
		</div>

		<div class="form-group">
		<label class="col-sm-4 control-label">' . $msg->_LBL_PASSWORD[$msg->lang] . '</label>
		<div class="col-sm-4"><input type="password" name="password" class="form-control" value="' . @$data['password'] . '"></div>
		</div>

		<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8"><button type="submit" class="btn btn-primary" name="do_login">' . $msg->_BTN_LOGIN[$msg->lang] . '</button></div>
		</div>
	</form>';
	return $s;
}

	$parse = new Parse();
	$parse->get_tpl('index.tpl');
	$parse->set_tpl('{CONTENT}', login_form());
	$parse->tpl_parse();
	echo $parse->template;
?>
