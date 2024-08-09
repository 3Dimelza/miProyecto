<?php
date_default_timezone_set('America/La_Paz');
class UserData {
	public static $tablename = "user";
	
	public function UserData(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->password = "";
		$this->is_active = "0";
		$this->is_admin = "2"; // Por defecto, se registra como paciente
		$this->created_at = "NOW()";
		$this->fechaActualizacion = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,lastname,username,password,is_active,is_admin,created_at,fechaActualizacion) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->password\",$this->is_active,$this->is_admin,NOW(),NOW())";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$this->fechaActualizacion = date('Y-m-d H:i:s'); // Actualizar fechaActualizacion con la fecha y hora actual
		$sql = "update ".self::$tablename." set name=\"$this->name\", fechaActualizacion=\"$this->fechaActualizacion\", lastname=\"$this->lastname\", username=\"$this->username\", is_active=$this->is_active, is_admin=$this->is_admin where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	
}
?>
