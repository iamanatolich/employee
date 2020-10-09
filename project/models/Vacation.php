<?php
namespace Project\Models;
use Core\Application;
use \Core\Model;

class Vacation extends Model
{
    public static function tableName()
    {
        return 'vacation';
    }

    public function getByHoliday($datein, $dateout)
    {
        $sql = "SELECT * FROM " . static::tableName() . " 
			INNER JOIN users ON vacation.id_user = users.id 
			WHERE date_in>='" . $datein . "' AND date_out<='" . $dateout . "'";
        $db = Application::$db->prepare($sql);
        $db->execute();
        return $db->fetchAll();
    }

    public function addHoliday($datein, $dateout, $id)
    {
        if ($this->getByHoliday($datein, $dateout)) {
            return ['status' => false, 'message' => 'Такой отпуск уже существует'];
        }

        $data = [
            'date_in' => $datein,
            'date_out' => $dateout,
            'id_user' => $id,
        ];

        if ($this->insert($data)) {
            return ['status' => true, 'message' => 'Вы успешно добавили отпуск'];
        }
    }

    public function checkbox($id, $datein, $dateout)
    {
        $sql = "UPDATE " . static::tableName() . " SET approved = 1 WHERE id_user=? AND date_in=? AND date_out=?";
        $db = Application::$db->prepare($sql);
        return $db->execute([$id, $datein, $dateout]);
    }
}