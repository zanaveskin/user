<?php 
	require 'db.php';
?>

<?php if ( isset ($_SESSION['logged_user']) ) : ?>
	�����������! <br/>
	������, <?php echo $_SESSION['logged_user']->login; ?>!<br/>

	<a href="logout.php">�����</a>

<?php else : ?>
�� �� ������������<br/>
<a href="/login.php">�����������</a>
<a href="/signup.php">�����������</a>
<?php endif; ?>

