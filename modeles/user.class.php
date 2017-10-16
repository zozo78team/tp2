<?php
class Genre{
	private $id;
	private $nom;
	private $mail;
	private $mdp;

	public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id=$value;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($value)
    {
        $this->nom=$value;
    }
	public function setMail()
	{
		return $this->mail;
	}
	public function getMail($value)
	{
		$this->mail=$value;
	}
	public function setMdp()
	{
		return $this->mdp;
	}
	public function getMdp($value)
	{
		$this->mdp=$value;
	}
    public function __toString()
    {
        return "id : ". $this->id. " - nom : ".$this->nom." - mail : ".$this->mail ;
    }

    public function __construct($id=null,$nom=null)
    {
        if($id!=null && $nom!=null)
        {
            $this->setId($id);
            $this->setNom($nom);
			$this->setMail($mail);
			$this->setMdp($mdp);
        }
    }
}
