<?php

namespace App\Controller;

use App\Entity\Book;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

final class BookController
{
    const NEEDS = [
        "title", "summary", "author", "editor", "n_isbn", "available", "borrowed"
    ];

    public function show(string $sId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $bookRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Book"));
        $noteRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Note"));
        $book = $bookRepo->find( (int) $sId);
        $aNotes = $noteRepo->findBy(["book" => $sId]);

        include(__DIR__ . "/../Vues/Book/ShowBook.php");
    }

    public function add() // fonctionne 
    {
        $em = EntityManagerHelper::getEntityManager();
        $userRepo = new EntityRepository($em, new ClassMetadata("App\Entity\User"));
        $aUser = $userRepo->findAll();

        if (!empty($_POST)) {
            foreach (self::NEEDS as $value) {
                if (!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__ . "/../Vues/Book/AddBook.php");
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if (!$_POST[$value] === "") {
                    echo "Champs obligatoire";
                    die();
                }
            }

            try {                
                $author = $userRepo->find($_POST["author"]);
                $editor = $userRepo->find($_POST["editor"]);
            } catch (\Throwable $th) {
                $error = "Un probleme est survenu durant le recueil d'un utilisateur";
            }
            $n_isbn = (int) $_POST["n_isbn"];
            $available = (int) $_POST["available"];
            $borrowed = (int) $_POST["borrowed"];
            $book = new Book($_POST["title"], $_POST["summary"], $author, $editor, $n_isbn, $available, $borrowed);

            try {
                $em->persist($book);
                $em->flush();
            } catch (\Throwable $th) {
                $error = "Un probleme est survenu durant l'ajout";
            }
          
        }

        include(__DIR__ . "/../Vues/Book/AddBook.php");
    }

    public function modify(string $id) // ne fonctionne plus
    {  
        $em = EntityManagerHelper::getEntityManager();
        $bookRepository = new EntityRepository($em, new ClassMetadata("App\Entity\Book"));
        $userRepository = new EntityRepository($em, new ClassMetadata("App\Entity\User"));

        $book = $bookRepository->find($id);
        $userRepo = $userRepository->findAll();

        if (empty($_POST)) {
           
            foreach (self::NEEDS as $value) {
                if(!array_key_exists($value, $_POST)) {
                    $error = "Le champs $value n'a pas été remplit";
                    include_once(__DIR__."/../Vues/Book/ModifyBook.php");
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));

                if (!$_POST[$value] === "") {
                    echo "Champs obligatoire";
                    die();
                }
            }

            if ($_POST["title"] !== $book->getTitle()) {
                $book->setTitle($_POST["title"]);
            }
           
            if ( $_POST["n_isbn"] !== $book->getNIsbn()) {
                $book->setNIsbn((int)$_POST["n_isbn"]);
            }
             
                try {
                    $em->persist($book);
                    $em->flush();
                    $error = "Modifié avec succès";
                } catch (\Throwable $th) {
                    $error = "une erreur est survenue à la modification";
                }
            }
                include_once(__DIR__."/../Vues/Book/ModifyBook.php");
        }

    

            
        
    
    
    public function delete(string $id)  // fonctionne
    { 
            $em = EntityManagerHelper::getEntityManager();
            $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Book"));

            $book = $repository->find($id);

            $em->remove($book);
            $em->flush();

            include (__DIR__ . "/../Vues/Book/deletebook.php"); 
        }
    }
    
    
    
    //  echo "Article well delete"; 


