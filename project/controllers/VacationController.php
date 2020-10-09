<?php
namespace Project\Controllers;
use \Core\Controller;
use Project\Assets\Functions;
use Project\Models\Vacation;

class VacationController extends Controller
    {
        public function checkbox()
        {
            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }
            $authUser = Functions::getUser();
            if (($authUser['id_position'] != "2") && ($authUser['id_position'] != "1")) {
                $this->redirect("/error/404");
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'checkbox')
            {
                $id_user = $_POST['iduser'];
                if(isset($id_user)){
                    foreach($id_user as $str){
                        list($id, $datein, $dateout) = explode(",", $str);
                        //$model = new Vacation();
                        $check = (new Vacation())->checkbox($id, $datein, $dateout);
                    }

                    if($check == true) {
                        $_SESSION['flashSuccessMessage'] = 'Отпуск согласован';
                        $this->redirect("/");
                    }
                }
            }

        }

        public function index()
        {
            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }
            $this->title = 'Добавить отпуск';
            $holiday = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'date')
            {
                $datein = $_POST['datain'];
                $dateout = $_POST['dataout'];

                $errorMessage = [];
                if(empty($datein) && empty($dateout)) {
                    $errorMessage[] = 'Не заполнен период';
                }elseif($datein < date("Y-m-d")){
                    $errorMessage[] = 'Введите сегодняшнюю дату';
                }elseif($dateout < date("Y-m-d")){
                    $errorMessage[] = 'Введите сегодняшнюю дату';
                }elseif($datein > $dateout){
                    $errorMessage[] = "Ошибка! Даты введены неверно!";
                }

                if(!empty($errorMessage)) {
                    $_SESSION['flashErrorMessage'] = implode(", ", $errorMessage);
                    $this->redirect("/");
                }



                /*
                if(empty($datein) && empty($dateout)){
                    $Errormessag = 'Не заполнен период';
                }elseif($datein < date("Y-m-d")){
                    $Errormessag = 'Введите сегодняшнюю дату';
                }elseif($dateout < date("Y-m-d")){
                    $Errormessag = 'Введите сегодняшнюю дату';
                }else{
                    $Successmessage = '<script type="text/javascript" src="script.js?1"></script><a onclick="openWin2(this)" href="#&amp;id='.Application::getUser()['id'].'&amp;datain='.$datein.'&amp;dataout='.$dateout.'#end">Добавить отпуск</a><br><br>Нет записей';
                } */

                //$model = new Vacation();
                $holiday = (new Vacation())->getByHoliday($datein, $dateout);

            }

            return $this->render("/vacation/index", [
                'holiday' => $holiday,
            ]);

        }


        function add($params)
        {

            if(!Functions::isLogin()) {
                $this->redirect("/login");
            }
            $this->title = 'Добавить отпуск';
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'date')
            {

                $datein = $_POST['datain'];
                $dateout = $_POST['dataout'];

                $errorMessage = [];
                if(empty($datein) && empty($dateout)) {
                    $errorMessage[] = 'Не заполнен период';
                }elseif($datein < date("Y-m-d")){
                    $errorMessage[] = 'Введите сегодняшнюю дату';
                }elseif($dateout < date("Y-m-d")){
                    $errorMessage[] = 'Введите сегодняшнюю дату';
                }elseif($datein > $dateout){
                    $errorMessage[] = "Ошибка! Даты введены неверно!";
                }

                if(!empty($errorMessage)) {
                    $_SESSION['flashErrorMessage'] = implode(", ", $errorMessage);
                    $this->redirect("/");
                }else{

                    $id = Functions::getUser()['id'];
                    $add = (new Vacation())->addHoliday($datein, $dateout, $id);

                    if($add['status'] == true) {
                        $_SESSION["flashErrorMessage"] = $add['message'];
                        $this->redirect("/");
                    } else {
                        $_SESSION["flashSuccessMessage"] = $add['message'];
                        $this->redirect("/");
                    }

                }

            }

            return $this->render("/vacation/add");
        }

    }