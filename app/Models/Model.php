<?php

namespace Assignment1\Models;

use Assignment1\Database\Connection;
use mysqli;

abstract class Model
{
	protected int $id;
	protected static mysqli $connection;
	private string $createdAt;
	private ?string $editedAt;
	private ?string $deletedAt;

	function __construct()
	{
		$this->connect();
	}

	static protected function connect()
	{
		$database = new Connection();
		self::$connection = $database->connect();
	}

	protected function close()
	{
		if (self::$connection->close() === false) {
			print "Could not close MySQL connection.\n";
		}
	}

	public static abstract function findById(int $id): ?self;
	protected abstract function save();
	protected abstract function delete();
}
