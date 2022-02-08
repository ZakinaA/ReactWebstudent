<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaiss;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cheminImg;

    /**
     * @ORM\ManyToOne(targetEntity=Maison::class, inversedBy="etudiants")
     */
    private $maison;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="etudiants")
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=Activite::class, mappedBy="etudiant", orphanRemoval=true)
     */
    private $activites;

    /**
     * @ORM\ManyToOne(targetEntity=Patronus::class, inversedBy="etudiants")
     */
    private $patronus;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }


          public function getCheminImg(): ?string
          {
              return $this->cheminImg;
          }

          public function setCheminImg(?string $cheminImg): self
          {
              $this->cheminImg = $cheminImg;

              return $this;
          }

          public function getMaison(): ?Maison
          {
              return $this->maison;
          }

          public function setMaison(?Maison $maison): self
          {
              $this->maison = $maison;

              return $this;
          }

          public function getStatut(): ?Statut
          {
              return $this->statut;
          }

          public function setStatut(?Statut $statut): self
          {
              $this->statut = $statut;

              return $this;
          }

          /**
           * @return Collection|Activite[]
           */
          public function getActivites(): Collection
          {
              return $this->activites;
          }

          public function addActivite(Activite $activite): self
          {
              if (!$this->activites->contains($activite)) {
                  $this->activites[] = $activite;
                  $activite->setEtudiant($this);
              }

              return $this;
          }

          public function removeActivite(Activite $activite): self
          {
              if ($this->activites->removeElement($activite)) {
                  // set the owning side to null (unless already changed)
                  if ($activite->getEtudiant() === $this) {
                      $activite->setEtudiant(null);
                  }
              }

              return $this;
          }

          public function getPatronus(): ?Patronus
          {
              return $this->patronus;
          }

          public function setPatronus(?Patronus $patronus): self
          {
              $this->patronus = $patronus;

              return $this;
          }


}
