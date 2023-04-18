<?php               //First commit

namespace App\Entity;

use App\Entity\User;
use App\Repository\MealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MealRepository::class)]
class Meal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    #[ORM\Column]
    private ?int $calories = null;

    #[ORM\Column]
    private ?float $rating = null;

    #[ORM\Column(length: 1000)]
    private ?string $preparation = null;

    #[ORM\Column]
    private ?int $cooking_time = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'meals')]
    private Collection $fk_user;

    #[ORM\OneToMany(mappedBy: 'fk_monday', targetEntity: Week::class)]
    private Collection $weeks;

    #[ORM\OneToMany(mappedBy: 'fk_meal', targetEntity: IngredientMeal::class)]
    private Collection $ingredientMeals;

    public function __construct()
    {
        $this->fk_user = new ArrayCollection();
        $this->weeks = new ArrayCollection();
        $this->ingredientMeals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getPreparation(): ?string
    {
        return $this->preparation;
    }

    public function setPreparation(string $preparation): self
    {
        $this->preparation = $preparation;

        return $this;
    }

    public function getCookingTime(): ?int
    {
        return $this->cooking_time;
    }

    public function setCookingTime(int $cooking_time): self
    {
        $this->cooking_time = $cooking_time;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getFkUser(): Collection
    {
        return $this->fk_user;
    }

    public function addFkUser(User $fkUser): self
    {
        if (!$this->fk_user->contains($fkUser)) {
            $this->fk_user->add($fkUser);
        }

        return $this;
    }

    public function removeFkUser(User $fkUser): self
    {
        $this->fk_user->removeElement($fkUser);

        return $this;
    }

    /**
     * @return Collection<int, Week>
     */
    public function getWeeks(): Collection
    {
        return $this->weeks;
    }

    public function addWeek(Week $week): self
    {
        if (!$this->weeks->contains($week)) {
            $this->weeks->add($week);
            $week->setFkMonday($this);
        }

        return $this;
    }

    public function removeWeek(Week $week): self
    {
        if ($this->weeks->removeElement($week)) {
            // set the owning side to null (unless already changed)
            if ($week->getFkMonday() === $this) {
                $week->setFkMonday(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, IngredientMeal>
     */
    public function getIngredientMeals(): Collection
    {
        return $this->ingredientMeals;
    }

    public function addIngredientMeal(IngredientMeal $ingredientMeal): self
    {
        if (!$this->ingredientMeals->contains($ingredientMeal)) {
            $this->ingredientMeals->add($ingredientMeal);
            $ingredientMeal->setFkMeal($this);
        }

        return $this;
    }

    public function removeIngredientMeal(IngredientMeal $ingredientMeal): self
    {
        if ($this->ingredientMeals->removeElement($ingredientMeal)) {
            // set the owning side to null (unless already changed)
            if ($ingredientMeal->getFkMeal() === $this) {
                $ingredientMeal->setFkMeal(null);
            }
        }

        return $this;
    }
}
