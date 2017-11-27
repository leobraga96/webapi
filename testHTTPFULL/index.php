<?php include_once ('test_user.php'); ?>

<center>
	<input type="submit" name="SubmitU" value="TEST USER" style="color: #000000; background-color: #FF0000" onclick="window.location='index.php?user=1';">
	<br>
	<input type="submit" name="SubmitE" value="TEST EXPLOIT" style="color: #000000; background-color: #FF0000" onclick="window.location='index.php?exploit=1';">
	<br>
	<input type="submit" name="SubmitL" value="TEST LOGIN" style="color: #000000; background-color: #FF0000" onclick="window.location='index.php?login=1';">
	<br><br>
</center>
<?php

if(isset($_GET['user']) == 1){
	echo 'USER: <BR>';


	class TestUserController 
	{
		
		public function routeOperation() 
		{
			testGetUser();
			testUserInsertValido();
			testUserInsertBodyInvalido();
			testUserInsertInvalidoName();
			testUserInsertInvalidoRegisternumber();
			testUserInsertInvalidoUsername();
			testUserInsertInvalidoPassword();
			testUserInsertInvalidoInstitution();
		}
	}

}

if(isset($_GET['login']) == 1){
	echo 'LOGIN: <BR>';


	class TestLoginController 
	{
		
		public function routeOperation() 
		{
			testUserLogin();
			testUserLoginInvalido();
		}
	}

}

if(isset($_GET['exploit']) == 1)
{
	echo 'EXPLOIT: <BR>';

	class TestExploitController 
	{
		
		public function routeOperation() 
		{
			testGetExploit();
			testExploitInsertValido();
			testExploitInsertBodyinvalido();
			testExploitInsertIdexploitInvalido();
			testExploitInsertPortaValida();
			testExploitInsertDescricaoInvalida();
			testExploitInsertTypeInvalido();
		}
	}

}