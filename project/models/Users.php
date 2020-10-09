<?php
    namespace Project\Models;
    use Core\Application;
    use \Core\Model;

    class Users extends Model
    {

        public static function tableName()
        {
            return 'users';
        }

        public function addUser($login, $password, $name, $surname, $id_position)
        {
            if($this->getByLogin($login)) {
                return ['status' => false, 'message' => 'Такой профиль уже существует'];
            }

            $data = [
                'username' => $login,
                'password' => $password,
                'name' => $name,
                'surname' => $surname,
                'id_position' => $id_position
            ];


            if($this->insert($data)) {
                return ['status' => true, 'message' => 'Вы успешно зарегистрировали пользователя'];
            }
        }

        public function allUsers()
        {
            return $this->getAll('SELECT * FROM users');
        }

        public function getById($link)
        {
            $rum = $this->getAll("SELECT * FROM users WHERE id = '$link'");
            if($rum == null){
                return $this->redirect('/error/404/');
            }
            return $this->getAll("SELECT * FROM users WHERE id = '$link'");
        }

        public function editUser($id, $login, $password, $name, $surname,  $id_position, $first_names)
        {
            if($first_names[0] !== $login)
            {
                if($this->getByLogin($login)) {
                    return ['status' => false, 'message' => 'Такой профиль уже существует'];
                }
            }


            $data = [
                'username' => $login,
                'password' => $password,
                'name' => $name,
                'surname' => $surname,
                'id_position' => $id_position,
            ];

            if($this->update($data, $id)){
                return ['status' => true, 'message' => 'Вы успешно отредактировали профиль'];
            }
        }

        public function login($login, $password)
        {
            $myrow = $this->getByLogin($login);
            if(!$myrow) {
                return [
                    'status' => false,
                    'message' => 'Такой пользователь не существует'
                ];
            }



            if(password_verify($password, $myrow['password'])) {
               //var_dump($myrow['password']);
                $_SESSION['username'] = $myrow;
                return ['status' => true];
            }

            return [
                'status' => false,
                'message' => 'Ошибка! Неверный пароль!'
            ];

        }

    }