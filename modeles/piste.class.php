<?php
class Genre {
	protected $p_alb;
    protected $p_mor;
	protected $p_duree;
	protected $p_num;

    public function getPAlb()
    {
        return $this->p_alb;
    }
    public function setPAlb($value)
    {
        $this->p_alb=$value;
    }

    public function getPMor()
    {
        return $this->p_mor;
    }
    public function setPMor($value)
    {
        $this->p_mor=$value;
    }
    public function getPDuree()
    {
        return $this->p_duree;
    }
    public function setPDuree($value)
    {
        $this->p_duree=$value;
    }
	public function getPNum()
    {
        return $this->p_num;
    }
    public function setPNum($value)
    {
        $this->p_num=$value;
    }
    public function __toString()
    {
        return "Album n°". $this->p_alb. " - Morceau n°".$this->p_mor." - Durée : ".$this->p_duree."secondes - Position dans l'album : ".$this->p_num ;
    }

    public function __construct($p_alb=null,$p_mor=null,$p_duree=null,$p_num=null)
    {
        if($p_alb!=null && $p_mor!=null && $p_duree!=null && $p_num!=null)
        {
			$this->setPAlb($p_alb);
            $this->setPMor($p_mor);
            $this->setPDuree($p_duree);
			$this->setPNum($p_num);
        }
    }
}
