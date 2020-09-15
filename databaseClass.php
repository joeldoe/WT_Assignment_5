<?php

class Workshop
{
	// $conn will make the connection with the database
	private $conn;

	function __construct()
	{
		$this->conn = mysqli_connect('localhost','root','','assignments');
	}

	// create_table() will create a new table in the database
	function create_table()
	{
		if($this->conn)
		{
			$query = "create table registrations(Time_Stamp varchar(30), Name varchar(30), Email varchar(30), Phone int(15), Age int(2), Workshop varchar(30), Batch varchar(30))";
			$execute = mysqli_query($this->conn,$query);
			return json_encode($execute);
		}
	}

	// insert_row() will insert a new row into the table
	function insert_row($date,$name,$email,$phone,$age,$workshop,$batch)
	{
		$query = "insert into registrations values('$date','$name','$email','$phone','$age','$workshop','$batch')";
		$execute = mysqli_query($this->conn,$query);
		return json_encode($execute);
	}

	// read_table() will return all the rows from the table
	function read_table()
	{
		$i = 0;
		$table = array();
		$query = "select * from registrations";
		$execute = mysqli_query($this->conn,$query);

		if($execute)
		{
			while($rows = mysqli_fetch_array($execute))
			{
				$table[$i] = array($rows['Time_Stamp'],$rows['Name'],$rows['Email'],$rows['Phone'],$rows['Age'],$rows['Workshop'],$rows['Batch']);
				$i++;
			}
			return json_encode($table);
		}
		else return "Table not found";
	}
}

?>