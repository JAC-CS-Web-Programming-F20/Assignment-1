<?php

namespace Assignment1\Models;

class Category extends Model
{
	private User $createdBy;
	private string $title;
	private string $description;
	private array $posts;

	private function __construct()
	{
	}

	static public function create(int $userId, string $title, string $description): ?Category
	{
		return null;
	}

	static public function findById(int $id): ?Category
	{
		return null;
	}

	static public function findByTitle(string $title): ?Category
	{
		return null;
	}

	public function findAllPosts(): array
	{
		return [];
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
