<?php

class Msg {

	public $_LBL_LOGIN = array ('RU' => 'Логин', 'EN' => 'Login');
	public $_LBL_PASSWORD = array ('RU' => 'Пароль', 'EN' => 'Password');
	public $_LBL_EMAIL = array ('RU' => 'Email', 'EN' => 'Email');
	public $_LBL_PASSWORD_REPEAT = array ('RU' => 'Повторный пароль', 'EN' => 'Repeat password');
	public $_BTN_LOGIN = array ('RU' => "Войти", 'EN' => 'Log in');
	public $_BTN_REGISTER = array ('RU' => "Регистрация", 'EN' => 'Register');

	public $_ERR_WRONG_PWD = array ('RU' => 'Неверно введен пароль!', 'EN' => 'Wrong password!');
	public $_ERR_NO_LOGIN = array ('RU' => 'Введите логин!', 'EN' => 'Enter login!');
	public $_ERR_NO_PASSWORD = array ('RU' => 'Введите пароль!', 'EN' => 'Enter password!');
	public $_ERR_NO_EMAIL = array ('RU' => 'Введите email!', 'EN' => 'Enter email!');
	public $_ERR_LOGIN_EXIST = array ('RU' => 'Пользователь с таким логином существует!', 'EN' => 'Login exists!');
	public $_ERR_EMAIL_EXIST = array ('RU' => 'Пользователь с таким email существует!', 'EN' => 'Email exists!');
	public $_ERR_LOGIN_NOT_EXIST = array ('RU' => 'Пользователь с таким логином не найден!', 'EN' => 'Login doesn\'t exist');

	public $lang = 'RU';

	public function __construct () {
		if ($_SESSION['lang_id']) {
			$lang =  $_SESSION['lang_id'];
		};
	}	
}

?>	
