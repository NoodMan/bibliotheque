<?php

namespace App\Controller;

use App\Entity\Note;
use App\Helpers\EntityManagerHelper;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Router\Router;


class NoteController
{
    const NEEDS = [
        "note", "comment"
    ];

    public function add( string $bookId)
    {
        $em = EntityManagerHelper::getEntityManager();
        $userRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Book"));
        $noteRepo = new EntityRepository($em, new ClassMetadata("App\Entity\Note"));
        $book = $userRepo->find((int) $bookId);

        if(!$book) {
            exit("aucun artcile trouvé");
        }

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

            $note = new Note($_POST["comment"], (int)$_POST["note"], $book);
            $em->persist($note);
            $em->flush();
            $getNote = $noteRepo->findBy(["book" => $book->getId(), "comment" => $_POST["comment"], "note" => (int)$_POST["note"]]);
            $book->addNote($getNote[0]);

            try {
                $em->persist($book);
                $em->flush();
            } catch (\Throwable $th) {
                $error = "Un probleme est survenu durant l'ajout";
            }
          
        }

        Router::redirect("books/$bookId");
        
    }

    public function delete(string $id)
    { 
            $em = EntityManagerHelper::getEntityManager();
            $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Note"));

            $note = $repository->find($id);

            $em->remove($note);
            $em->flush();

            include (__DIR__ . "/../Vues/Note/deletenote.php"); // fonctionne grace a Amelie
        }
}