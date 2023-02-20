<?php
	class connect_db {
    private $host;
    private $user;
    private $bdd;
    private $passwd;

	function __construct() 
	{
		$this->host = getenv('DB_HOST');
		$this->user = getenv('DB_USER');
		$this->passwd = getenv('DB_PASSWORD');
		$this->bdd = getenv('DB_DATABASE');
	}

	public function seConnecter() 
	{
		$co = mysqli_connect($this->host,$this->user,$this->passwd,$this->bdd) or die("erreur de connexion");
    	return $co;
	}

	public function seDeconnecter() 
	{
		mysqli_close($this->seConnecter());
	}

}
	$DB = new connect_db();
	$coBDD = $DB->seConnecter();

?>
