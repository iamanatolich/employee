<?php
	namespace Core;



 abstract class Model
	{
     abstract public static function tableName();

        public function get($query)
        {
            $db = Application::$db->query($query);
            return $db->fetch();
        }


        public function getAll($query)
        {
            $db = Application::$db->query($query);
            return $db->fetchAll();
        }

        public function getByLogin($login)
        {
          $sql = "SELECT * FROM ".static::tableName()."  WHERE username = ?";
           // var_dump($sql);
            $db = Application::$db->prepare($sql);
            $db->execute([$login]);
            return $db->fetch();
        }

        public static function redirect($url)
        {
            header("Location: $url");
            die;
        }

        public function insert($data)
        {
            $rows = [];
            foreach($data as $column => $value) {
                $rows[] = is_int($value) ? "{$column}={$value}" : "{$column}='$value'";
            }
            $sql = "INSERT INTO ".static::tableName()." SET ".implode(", ", $rows);
            Application::$db->query($sql);
            return Application::$db->lastInsertId();
        }

         public function delete($tbl)
         {
             $sql = "TRUNCATE TABLE $tbl";
             $db = Application::$db->prepare($sql);
             return $db->execute();
         }


        public function update($data, $id)
        {
            $rows = [];
            foreach($data as $column => $value) {
                $rows[] = is_int($value) ? "{$column}={$value}" : "{$column}='$value'";
            }

            $sql = "UPDATE ".static::tableName()." SET ".implode(", ", $rows)." WHERE id = ?";
            var_dump($sql);
            $db = Application::$db->prepare($sql);
            $db->execute([$id]);
            return $db->execute([$id]);
        }

	}
