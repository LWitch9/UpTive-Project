<?php
require_once "Repository.php";
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        //Polecenie pobrania danych z bazy
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM public.users WHERE email = :email'
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
            $user['name'], //Change user structure (replace one username with two name and surname)
            $user['surname'],
          $user['email'],
          $user['password']

        );
    }
    public function addUser(array $data){
        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.users (name, surname, email, password) VALUES(:name,:surname,:email,:password);"
        );


        $statement->execute($data);
    }
}