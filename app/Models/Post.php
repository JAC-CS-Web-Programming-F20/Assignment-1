<?php

namespace Assignment1\Models;

class Post extends Model
{
	private User $user;
	private Category $category;
	private string $title;
	private string $type;
	private string $content;

	private function __construct()
	{
	}

	static public function create(int $userId, int $categoryId, string $title, string $type, string $content): ?Post
	{
		return null;
	}

	static public function findByCategory(int $categoryId): array
	{
		return [];
	}

	static public function findById(int $id): ?Post
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
