<?php
    namespace Project\Controllers;
    use \Core\Controller;
    use Project\Assets\Functions;
    use Project\Models\Users;

    class UsersController extends Controller
    {
        public function index($params)
        {
            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }
            $this->title = 'Личный кабинет';
            return $this->render('users/index');
        }

        public function login()
        {
            if(Functions::isLogin()) {
                $this->redirect("/users/");
            }
            $this->title = 'Логин';

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'login')
            {
//                $login = filter_input(INPUT_POST, 'login', FILTER_DEFAULT);
//                $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
                $login = $_POST['username'];
                $password = $_POST['password'];

                if(!$login || !$password) {
                    $_SESSION["flashErrorMessage"] = "Заполните все поля";
                    $this->redirect("/login");
                }

                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $password = stripslashes($password);
                $password = htmlspecialchars($password);

                $login = trim($login);
                $password = trim($password);

                //password_verify($_POST['password'], $password);

                //var_dump($password);

                $model = new Users();
                $login = $model->login($login, $password);
                if($login['status'] == true) {
                    $this->redirect("/users/");
                } else {
                    $_SESSION["flashErrorMessage"] = $login['message'];
                    $this->redirect("/login");
                    //echo 'message error';
                }
            }

            return $this->render('users/login');
        }

        public function reg()
        {
            if(!Functions::isLogin()) {
                $this->redirect("/users/");
            }
            $authUser = Functions::getUser();
            if ($authUser['id_position'] != "2") {
                $this->redirect("/error/404");
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'add-user')
            {
                $login = $_POST['username'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $id_position = $_POST['position'];

                if(!$login || !$password || !$name) {
                    $_SESSION["flashErrorMessage"] = "Заполните все поля";
                    $this->redirect("/users/reg");
                }

                $name = stripslashes($name);
                $name = htmlspecialchars($name);
                $surname = stripslashes($surname);
                $surname = htmlspecialchars($surname);
                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $password = stripslashes($password);
                $password = htmlspecialchars($password);

                $login = trim($login);
                $password = trim($password);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $addUser = (new Users())->addUser($login, $password, $name, $surname, $id_position);
                if($addUser['status'] == true) {
                    $_SESSION["flashErrorMessage"] = $addUser['message'];
                    $this->redirect("/users/reg");
                } else {
                    $_SESSION["flashErrorMessage"] = $addUser['message'];
                    $this->redirect("/users/reg");
                }

            }

            $this->title = 'Добавить пользователя';
            return $this->render('users/reg');
        }

        public function edit()
        {
            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }
            $id = Functions::getUser()['id'];
            $model = new Users();
            $myProfiles = $model->getById($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'edit')
            {


                $login = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $id_position = $_POST['position'];
                $id = $_POST['id'];

                $first_names['0'] = Functions::getUser()['id'];

                $user = array_column($myProfiles, 'username');

                $name = stripslashes($name);
                $name = htmlspecialchars($name);
                $surname = stripslashes($surname);
                $surname = htmlspecialchars($surname);
                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $password = stripslashes($password);
                $password = htmlspecialchars($password);
                $login = trim($login);
                $password = trim($password);

                if(!$login || !$password || !$name || !$surname) {
                    $_SESSION["flashErrorMessage"] = "Заполните все поля";
                    $this->redirect("/users/edit");
                }
                //unset($_SESSION['username']);
                $edit = $model->editUser($id, $login, $password, $name, $surname, $id_position, $user);

                if($edit['status'] == true) {
                    $_SESSION["flashSuccessMessage"] = $edit['message'];
                    //session_reset();
                } else {
                    $_SESSION["flashErrorMessage"] = $edit['message'];
                }
                $this->redirect("/users/edit");


            }



            $this->title = 'Редактировать';
            return $this->render('users/edit',[
                'myProfiles' => $myProfiles
            ]);

        }

        public function allUsers()
        {
            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }

            $authUser = Functions::getUser();
            if ($authUser['id_position'] != "2") {
                $this->redirect("/error/404");
            }


            $users = (new Users())->allUsers();
            $this->title = 'Все пользователи';
            return $this->render('users/all',[
                'users' => $users,
            ]);
        }

        public function editUsr($params)
        {
            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }


            $model = new Users();
            $myProfiles = $model->getById($params['id']);

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'edit')
            {


                $login = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $id_position = $_POST['position'];
                $id = $_POST['id'];

                $first_names['0'] = Functions::getUser()['id'];

                $user = array_column($myProfiles, 'username');

                $name = stripslashes($name);
                $name = htmlspecialchars($name);
                $surname = stripslashes($surname);
                $surname = htmlspecialchars($surname);
                $login = stripslashes($login);
                $login = htmlspecialchars($login);
                $password = stripslashes($password);
                $password = htmlspecialchars($password);
                $login = trim($login);
                $password = trim($password);

                if(!$login || !$password || !$name || !$surname) {
                    $_SESSION["flashErrorMessage"] = "Заполните все поля";
                    $this->redirect("/users/edit/".$params['id']);
                }
                //unset($_SESSION['username']);
                $edit = $model->editUser($id, $login, $password, $name, $surname, $id_position, $user);

                if($edit['status'] == true) {
                    $_SESSION["flashSuccessMessage"] = $edit['message'];
                    //session_reset();
                } else {
                    $_SESSION["flashErrorMessage"] = $edit['message'];
                }
                $this->redirect("/users/edit/".$params['id']);


            }



            $this->title = 'Редактировать';
            return $this->render('users/edit',[
                'myProfiles' => $myProfiles
            ]);

        }

        public function logout()
        {
            $this->title = 'Выход';
            unset($_SESSION['username']);
            $this->redirect("/");
            //return true;
        }

//        public function checkbox()
//        {
//            $authUser = Functions::getUser();
//            if (($authUser['id_position'] != "2") && ($authUser['id_position'] != "1")) {
//                $this->redirect("/users/404");
//            }
//
//            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'checkbox')
//            {
//                $id_user = $_POST['iduser'];
//                if(isset($id_user)){
//                    foreach($id_user as $str){
//                        list($id, $datein, $dateout) = explode(",", $str);
//                        $model = new Model_Holiday();
//                        $check = $model->checkbox($id, $datein, $dateout);
//                    }
//
//                    if($check == true) {
//                        $_SESSION['flashSuccessMessage'] = 'Отпуск согласован';
//                        $this->redirect("/");
//                    }
//                }
//            }
//        }
    }