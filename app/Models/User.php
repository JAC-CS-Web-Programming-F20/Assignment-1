<?php

namespace Assignment1\Models;

class User extends Model
{
	private string $username;
	private string $email;
	private string $password;
	private int $postScore;
	private int $commentScore;
	private ?string $avatar;

	private function __construct()
	{
	}

	static public function create(string $username, string $email, string $password): ?User
	{
		return null;
	}

	static public function findById(int $id): ?User
	{
		return null;
	}

	static public function findByEmail(string $email): ?User
	{
		return null;
	}

	public function save(): bool
	{
		return false;
	}

	public function delete(): bool
	{
		return false;
	}
}
