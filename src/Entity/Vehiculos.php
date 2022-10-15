<?php

namespace App\Entity;

use App\Repository\VehiculosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculosRepository::class)]
class Vehiculos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $precio = null;

    #[ORM\Column]
    private ?bool $disponibilidad = null;

    #[ORM\OneToMany(mappedBy: 'vehiculos', targetEntity: Images::class)]
    private Collection $Images;


 

    public function __construct()
    {
        $this->Images = new ArrayCollection();
    }

       
   
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {
        return $this->nombre;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function isDisponibilidad(): ?bool
    {
        return $this->disponibilidad;
    }

    public function setDisponibilidad(bool $disponibilidad): self
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * @return Collection<int, images>
     */

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->Images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->Images->contains($image)) {
            $this->Images->add($image);
            $image->setVehiculos($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->Images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getVehiculos() === $this) {
                $image->setVehiculos(null);
            }
        }

        return $this;
    }



   

   

}
