<?php

class Msg {

	public $_LBL_LOGIN = array ('RU' => '�����', 'EN' => 'Login');
	public $_LBL_PASSWORD = array ('RU' => '������', 'EN' => 'Password');
	public $_LBL_EMAIL = array ('RU' => 'Email', 'EN' => 'Email');
	public $_LBL_PASSWORD_REPEAT = array ('RU' => '��������� ������', 'EN' => 'Repeat password');
	public $_BTN_LOGIN = array ('RU' => "�����", 'EN' => 'Log in');
	public $_BTN_REGISTER = array ('RU' => "�����������", 'EN' => 'Register');

	public $_ERR_WRONG_PWD = array ('RU' => '������� ������ ������!', 'EN' => 'Wrong password!');
	public $_ERR_NO_LOGIN = array ('RU' => '������� �����!', 'EN' => 'Enter login!');
	public $_ERR_NO_PASSWORD = array ('RU' => '������� ������!', 'EN' => 'Enter password!');
	public $_ERR_NO_EMAIL = array ('RU' => '������� email!', 'EN' => 'Enter email!');
	public $_ERR_LOGIN_EXIST = array ('RU' => '������������ � ����� ������� ����������!', 'EN' => 'Login exists!');
	public $_ERR_EMAIL_EXIST = array ('RU' => '������������ � ����� email ����������!', 'EN' => 'Email exists!');
	public $_ERR_LOGIN_NOT_EXIST = array ('RU' => '������������ � ����� ������� �� ������!', 'EN' => 'Login doesn\'t exist');

	public $lang = 'RU';

	public function __construct () {
		if ($_SESSION['lang_id']) {
			$lang =  $_SESSION['lang_id'];
		};
	}	
}

?>	
