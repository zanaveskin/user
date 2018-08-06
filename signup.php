<?php 
	require 'db.php';
	require 'template.php';
	require 'msg.php';

	$data = $_POST;
	$msg = new Msg ();

	//если кликнули на button
	if ( isset($data['do_signup']) ) {
    
		$errors = array();
		if ( trim($data['login']) == '' ) {
			$errors[] = $msg->_ERR_NO_LOGIN[$msg->lang];
		}

		if ( trim($data['email']) == '' ) {
			$errors[] = $msg->_ERR_NO_EMAIL[$msg->lang];
		}

		if ( $data['password'] == '' ) {
			$errors[] = $msg->_ERR_NO_PASSWORD[$msg->lang];
		}

		if ( $data['password_2'] != $data['password'] ) {
			$errors[] = $msg->_ERR_WRONG_PWD;
		}

		if ( R::count('users', "login = ?", array($data['login'])) > 0)	{
			$errors[] = $msg->_ERR_LOGIN_EXIST;
		}
    
		if ( R::count('users', "email = ?", array($data['email'])) > 0)	{
			$errors[] = $msg->_ERR_EMAIL_EXIST;
		}

		if ( empty($errors) ) {
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); 

			R::store($user);
			echo '<div style="color:dreen;">¬ы успешно зарегистрированы!</div><hr>';
		} else {
			echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
		}

	}

function signup_form () {
	$msg = new Msg ();
	$s = '
	<form action="/signup.php" method="POST" role="form" class="form-horizontal">
	<div class="form-group">
	<label class="col-sm-4 control-label">' . $msg->_LBL_LOGIN[$msg->lang] . '</label>
	<div class="col-sm-4"><input type="text" name="login" class="form-control" value="' . @$data['login'] . '"></div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label">' . $msg->_LBL_EMAIL[$msg->lang] . '</label>
	<div class="col-sm-4"><input type="email" name="email" class="form-control" value="' . @$data['email'] . '"></div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label">' . $msg->_LBL_PASSWORD[$msg->lang] . '</label>
	<div class="col-sm-4"><input type="password" name="password" class="form-control" value="' . @$data['password'] . '"></div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label">' . $msg->_LBL_PASSWORD_REPEAT[$msg->lang] . '</label>
	<div class="col-sm-4"><input type="password" name="password_2" class="form-control" value="' . @$data['password_2'] . '"></div>
	</div>

	<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8"><button type="submit" name="do_signup">' . $msg->_BTN_REGISTER[$msg->lang] . '</button></div>
	</div>
	</form>';

	return $s;
}

	$parse = new Parse();
	$parse->get_tpl('index.tpl');
	$parse->set_tpl('{CONTENT}', signup_form());
	$parse->tpl_parse();
	echo $parse->template;

?>
