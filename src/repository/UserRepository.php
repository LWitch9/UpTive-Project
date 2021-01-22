<?php
require_once "Repository.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Achievement.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        //Polecenie pobrania danych z bazy
        $statement = $this->database->connect()->prepare(
            'select * FROM view_users_with_details 
                        where email = :email;'
        );
        //przypisanie danej :email z bazy do zmiennej $email
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            //Przypadek kiedy użytkownik nie zostanie znaleźiony (zamiast tablicy asocjacyjnej zawiera false)
            //TODO zrobić exception który zostanie rzucony w tym przypadku
            return null;
        }

        return new User(
          $user['email'],
          $user['password'],
          $user['name'],
          $user['surname'],
          $user['bio'],
          $user['avatar'],
          $user['salt']

        );
    }
    public function getUserByID(int $id): ?User
    {
        //Polecenie pobrania danych z bazy
        $statement = $this->database->connect()->prepare(
            'select * FROM view_users_with_details 
                        where id = ?;'
        );
        $statement->execute([$id]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            //Przypadek kiedy użytkownik nie zostanie znaleźiony (zamiast tablicy asocjacyjnej zawiera false)
            //TODO zrobić exception który zostanie rzucony w tym przypadku
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['bio'],
            $user['avatar']

        );
    }
    public function getUserId(string $email): ?int
    {
        //Polecenie pobrania danych z bazy
        $statement = $this->database->connect()->prepare(
            'select * FROM public.users 
                        where email = :email;'
        );
        //przypisanie danej :email z bazy do zmiennej $email
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            //Przypadek kiedy użytkownik nie zostanie znaleźiony (zamiast tablicy asocjacyjnej zawiera false)
            //TODO zrobić exception który zostanie rzucony w tym przypadku
            return null;
        }

        return $user['id'];
    }
    public function addUser(array $data){
        //TODO dodaj jakąś transakcje/funkcje /procedure do dodawania

        $help = $this->database->connect()->prepare(
            "SELECT add_return_id_user_details(?,?);"
        );


        $help->execute([$data['name'],$data['surname']]);
        $userDetails =$help->fetch(PDO::FETCH_ASSOC);

        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.users (email, password, id_user_details) VALUES(?,?,?);"
        );
        $statement->execute([$data['email'],$data['password'] ,$userDetails['add_return_id_user_details']]);
    }
    public function getUserActivities(string $email): array{

        $result = [];

        $statement = $this->database->connect()->prepare(
            'SELECT activity_name FROM view_users_activities  
                        where email = :email;'
        );

        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $activities = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($activities as $activity){
            $result[] = $activity['activity_name'];
        }

        return $result;
    }
    public function getUserAchievements(string $email): array{
        $result = [];

        $statement = $this->database->connect()->prepare(
            'SELECT title, text, img FROM view_users_achievements  
                        where email = :email;'
        );

        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $achievements = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($achievements as $achievement){
            $result[] = new Achievement(
                $achievement['title'],
                $achievement['text'],
                $achievement['img']
            );
        }

        return $result;
    }
}