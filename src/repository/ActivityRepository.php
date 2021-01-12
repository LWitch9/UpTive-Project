<?php
require_once "Repository.php";

class ActivityRepository extends Repository
{
    public function getActivity(int $id): ?string
    {
              $statement = $this->database->connect()->prepare(
            'SELECT * FROM public.activities WHERE id = :id'
        );
        //przypisanie danej :email z bazy do zmiennej $email
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $activity = $statement->fetch(PDO::FETCH_ASSOC);

        if($activity == false){
            //Przypadek kiedy użytkownik nie zostanie znaleźiony (zamiast tablicy asocjacyjnej zawiera false)
            //TODO zrobić exception który zostanie rzucony w tym przypadku
            return null;
        }

        return $activity['name'];

    }
    public function findActivityId(string $name){
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM public.activities WHERE name = :name'
        );
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->execute();

        $activity = $statement->fetch(PDO::FETCH_ASSOC);

        if($activity == false){
            return null;
        }

        return $activity['id'];
    }
}