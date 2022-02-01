<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Note
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */
    private int $id;

    /**
     * @ORM\Column(length="512")
    */
    private string $comment;

    /**
     * @ORM\Column(type="integer")
    */
    private int $note;

    /**
     * @ORM\ManyToOne(targetEntity="Book")
     * @ORM\JoinColumn(name="book", referencedColumnName="id", onDelete="CASCADE")
    */
    private Book $book;


    public function __construct(string $comment, int $note, Book $book)
    {
        $this->comment = $comment;
        $this->note = $note;
        $this->book = $book;

    }


        /**
         * Get the value of book
         */
        public function getBook()
        {
                return $this->book;
        }

        /**
         * Set the value of book
         */
        public function setBook($book): self
        {
                $this->book = $book;

                return $this;
        }
       
   
    

    /**
     * Get the value of comment
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @param string $comment
     *
     * @return self
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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
     * Get the value of note
     *
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @param int $note
     *
     * @return self
     */
    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }
   

}