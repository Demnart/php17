<?php
namespace Application\Classes;


class AbstractModel
{

    protected static $table;
    private $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
      return isset($this->data[$name]);
    }

    public static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClass(get_called_class());
        $res = $db->querry($sql);
        if ($res == false)
        {
            throw new ModelException('Ошибка получения данных');
        }
        else return $res;
    }

    public static function findOneByPK($id)
    {
        $sql = 'SELECT * FROM1' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClass(get_called_class());
        $res = $db->querry($sql,[':id'=>$id]);
        if ($res == false)
        {
            throw new ModelException('Ошибка получения данных');
        }
        else return $res[0];
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        foreach ($cols as $value)
        {
            $data[':'.$value] = $this->data[$value];
        }

        $sql = 'INSERT INTO ' . static::$table . '('. implode(',',$cols).') VALUES ('.implode(',',array_keys($data)).')';
        $db = new DB();
        $db->insertUpdateDelete($sql,$data);
        $this->data['id']= $db->getLastId();
    }

    protected function update()
    {
        $cols=[];
        $data=[];
        foreach ($this->data as $key=>$value)
        {
         $data[':' . $key] = $value;
         if ('id' == $key)

         {
             continue;
         }

         $cols[]=$key . '=:' . $key;

        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(',',$cols) . ' WHERE id=:id';
        $db = new DB();
        $db->insertUpdateDelete($sql,$data);
    }

    public function save()
    {
        if (!isset($this->data['id']))
        {
            $this->insert();
        }
        else
        {
            $this->update();
        }
    }

    public function delete()
    {
      $col = [];
      $data=[];
      foreach ($this->data as $key => $value)
      {
          $col[] = $key . '=:' .$key;
          $data[':' . $key] = $value;
      }

      $sql = 'DELETE FROM ' . static::$table . ' WHERE ' . implode(',',$col);
      $db = new DB();
      $db->insertUpdateDelete($sql,$data);
    }
}