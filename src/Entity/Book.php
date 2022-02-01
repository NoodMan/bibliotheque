<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="unique_article_details", columns={"n_isbn"})})
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\Column(length="100")
     */
    private string $title;

    /**
     * @ORM\Column(length="512")
     */
    private string $summary;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private User $author;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="editor", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private User $editor;

    /**
     * @ORM\Column(type="integer")
     */
    private int $n_isbn;

    /**
     * @ORM\Column(type="integer")
     */
    private int $available;

     /**
     * @ORM\Column(type="integer")
     */
    private int $borrowed;
    

    public function __construct(string $title, string $summary, User $author, User $editor, int $n_isbn, int $available, int $borrowed)
    {
        $this->title = $title;
        $this->summary = $summary;
        $this->author = $author;
        $this->editor = $editor;
        $this->n_isbn = $n_isbn;
        $this->available = $available;
        $this->borrowed = $borrowed;

    }
    
    /**
     * Get the value of borrowed
     */
    public function getBorrowed()
    {
            return $this->borrowed;
    }

    /**
     * Set the value of borrowed
     */
    public function setBorrowed($borrowed): self
    {
            $this->borrowed = $borrowed;

            return $this;
    }
    
    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of summary
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }

    /**
     * Set the value of summary
     *
     * @param string $summary
     *
     * @return self
     */
    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }


    /**
     * Get the value of author
     *
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param User $author
     *
     * @return self
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of editor
     *
     * @return User
     */
    public function getEditor(): User
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @param User $editor
     *
     * @return self
     */
    public function setEditor(User $editor): self
    {
        $this->editor = $editor;

        return $this;
    }


    /**
     * Get the value of n_isbn
     *
     * @return int
     */
    public function getNIsbn(): int
    {
        return $this->n_isbn;
    }

    /**
     * Set the value of n_isbn
     *
     * @param int $n_isbn
     *
     * @return self
     */
    public function setNIsbn(int $n_isbn): self
    {
        $this->n_isbn = $n_isbn;

        return $this;
    }

    public function addNote(Note $note): self // a verifier!! 
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->contains($note)) {
            $this->notes->remove($note);
        }

        return $this;
    }

    /**
     * Get the value of available
     *
     * @return int
     */
    public function getAvailable(): int
    {
        return $this->available;
    }

    /**
     * Set the value of available
     *
     * @param int $available
     *
     * @return self
     */
    public function setAvailable(int $available): self
    {
        $this->available = $available;

        return $this;
    }
}
