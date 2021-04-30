<?php
	class connect_db {
    private $host;
    private $user;
    private $bdd;
    private $passwd;

	function __construct($host,$user,$bdd,$passwd) 
	{
		$this->host = $host;
		$this->user = $user;
		$this->bdd = $bdd;
		$this->passwd = $passwd;
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
	$DB = new connect_db('localhost','root','bd_projet_tutore','');
	$coBDD = $DB->seConnecter();

?>
