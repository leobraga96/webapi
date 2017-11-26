<?php

class DBHandler {

	const DB_NAME = "dbexploit";

	public function getConnection() {
		try 
		{

		    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
			//var_dump($manager);

		    return $manager;

		} catch (MongoDB\Driver\Exception\Exception $e) 
		{
		    
		    return json_encode(
		    			 	Array(
		    			 		"msg"  => $e->getMessage(), 
		    			 		"file" => $e->getFile(), 
		    			 		"line" => $e->getLine()
		    			 	));       
		}
	}

	public function insert($document, $collection) 
	{
		$conn = $this->getConnection();
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->insert($document);
		$result = $conn->executeBulkWrite(
										"dbexploit.".$collection,
										 $bulk);

		//var_dump($result->isAcknowledged());
		
		if ($result->isAcknowledged())
		{
			http_response_code(200);
			return json_encode(Array("200" => "Ok"));
		}
		http_response_code(404);
		return json_encode(Array("404" => "Not found: object not inserted"));
	}

	public function search($conditions, $collection) 
	{
		$conn = $this->getConnection();
		$query = new MongoDB\Driver\Query($conditions, []);
		$rows = $conn->executeQuery("dbexploit.".$collection, $query);
		$result = Array();
		foreach ($rows as $row) {
        	array_push($result, $row);
    	}
		return json_encode($result);
	}

	public function update($conditions, $set, $collection)
	{
		$conn = $this->getConnection();
		$bulk = new MongoDB\Driver\BulkWrite;
		$bulk->update($conditions, $set);
		$result = $conn->executeBulkWrite("dbexploit.".$collection, $bulk);
		if ($result->isAcknowledged())
		{
			http_response_code(200);
			return json_encode(Array("200" => "Ok"));
		}
		http_response_code(404);
		return json_encode(Array("404" => "Not found: object not inserted"));
	}

}