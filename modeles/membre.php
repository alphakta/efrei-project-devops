<?php
	class Membre {
    private $co;
    private $id;
    // Client
    private $prenom;
    private $nom;
    private $mdp;
    private $email;
    private $adresse;
    private $tel;
    // Quartier
    private $codepostal;
    private $ville;

	function __construct()
	{
        switch(func_num_args())
        {
            case 3:
            $this->co = func_get_arg(0);
            $this->email = func_get_arg(1);
            $this->mdp = func_get_arg(2);
            break;

            case 9:
            $this->co = func_get_arg(0);

            $this->prenom = func_get_arg(1);
            $this->nom = func_get_arg(2);
            $this->mdp = func_get_arg(3);
            $this->email = func_get_arg(4);
            $this->adresse = func_get_arg(5);
            $this->tel = func_get_arg(6);

            $this->codepostal = func_get_arg(7);
            $this->ville = func_get_arg(8);
            break;

    	}
    }
  
    public function ajoutBD($co, $prenom, $nom, $mdp, $email, $adresse, $tel, $codepostal, $ville) {
        //mysqli_query($co, "INSERT into quartier (codeQuartier, nomQuartier) VALUES ('$codepostal','$ville')");
        $numQuartier = mysqli_insert_id($co);
    	mysqli_query($co, "insert into client (prenomClient, nomClient, mdpClient, mailClient, adresseClient, telClient, numQuartier) VALUES ('$prenom','$nom','$mdp','$email','$adresse','$tel', '$numQuartier')");
    }


    public function initialiser($mail, $mdp)
    {
        $requete = mysqli_query($this->co,"SELECT * FROM client WHERE mailClient = '$mail' AND mdpClient = '$mdp'");

        if(mysqli_num_rows($requete) != 0)
        {
            $data = mysqli_fetch_assoc($requete);
            $this->id = $data['numClient'];
            $this->prenom = $data['prenomClient'];
            $this->nom = $data['nomClient'];
            $this->mdp = $data['mdpClient'];
            $this->email = $data['mailClient'];
            $this->adresse = $data['adresseClient'];
            $this->tel = $data['telClient'];
            $this->connexion();

            header('Location: /PTS3/vues/espace_membre_client.php');

        }
        else
            header('Location: /PTS3/vues/formulaire_connexion.php');


    }

	public function modif_mdepasse($new_mdp) 
	{
		$this->mdpasse = $new_mdp;
	}

	public function connexion() 
	{
        session_start();     
        $_SESSION['email'] = $this->email;
        $_SESSION['prenom'] = $this->prenom;
        $_SESSION['id'] = $this->id;
	}


	public function deconnexion() 
	{
		session_destroy();
	}
}
?>
