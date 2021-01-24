<?php
require_once "Repository.php";
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Achievement.php';
require_once __DIR__.'/../repository/ActivityRepository.php';

class UserRepository extends Repository
{
    private $activityRepository;
    public function __construct()
    {
        parent::__construct();
        $this->activityRepository = new ActivityRepository();

    }
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
          $user['avatar']

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
    public function getUserDetailsId(string $email): ?int
    {
        $statement = $this->database->connect()->prepare(
            'select id_user_details FROM public.users 
                        where email = :email;'
        );

        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
        }

        return $user['id_user_details'];
    }
    public function addUser(array $data){
        $help = $this->database->connect()->prepare(
            "SELECT add_return_id_user_details(?,?);"
        );


        $help->execute([$data['name'],$data['surname']]);
        $userDetails =$help->fetch(PDO::FETCH_ASSOC);

        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.users (email, password, id_user_details)
                        VALUES(?,?,?);"
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
    public function getAllUsersExcept(string $email): array{

        $result =[];
        $statement = $this->database->connect()->prepare(
            'select * FROM view_users_with_details
                        WHERE email != ?;'
        );
        $statement->execute([$email]);

        $people = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($people as $person){
            $result[]=new User(
                $person['email'],
                $person['password'],
                $person['name'],
                $person['surname'],
                $person['bio'],
                $person['avatar'],
                $person['salt']

            );
        }

        return $result;
    }
    public function getAllUsersByString(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';

        $statement = $this->database->connect()->prepare("
            SELECT * FROM view_users_with_details
            WHERE LOWER(name) LIKE :searchString OR 
                  LOWER(surname) LIKE :searchString OR 
                  LOWER(CONCAT(name,' ',surname)) LIKE :searchString OR
                  LOWER(email) LIKE :searchString
        ");

        $statement->bindParam(':searchString', $searchString,PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRoleID(string $email): int{
        $statement = $this->database->connect()->prepare(
            'select role_id FROM public.users 
                        where email = :email;'
        );
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user['role_id'];
    }
    public function isAdmin(string $email): bool{
        if( $this->getRoleID($email) === 1){
            return true;
        }
        else{
            return false;
        }
    }
    public function updateProfile(array $data){

       if($data['bio'] == null){
           $this->updateBio($data);
       }
        if($data['activity'] == null){
            $this->updateActivity($data);
        }
    }
    private function updateBio(array $data){
        $statement = $this->database->connect()->prepare(
            "UPDATE public.users_details 
            SET bio = ?
            WHERE id = ?;"
        );
        $statement->execute([$data['bio'],$this->getUserDetailsId($data['email'])]);
    }

    private function updateActivity(array $data)
    {
        $help = $this->database->connect()->prepare(
            "SELECT * FROM public.users_details_activities
                        WHERE public.users_details_activities.id_user_details = ?
                                AND users_details_activities.id_activity = ?;"
        );


        $help->execute([
            $this->getUserDetailsId($data['email']),
            $this->activityRepository->getActivityID($data['activity'])
        ]);
        $user_activity =$help->fetch(PDO::FETCH_ASSOC);
        if($user_activity != null){
            return;
        }

        $statement = $this->database->connect()->prepare(
            "INSERT INTO public.users_details_activities (id_activity, id_user_details)
                        VALUES(?,?)"
        );
        $statement->execute([
            $this->activityRepository->getActivityID($data['activity']),
            $this->getUserDetailsId($data['email'])
        ]);
    }
}