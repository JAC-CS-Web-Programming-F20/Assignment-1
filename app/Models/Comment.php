<?php

namespace Assignment1\Models;

class Comment extends Model
{
	private User $user;
	private Post $post;
	private Comment $replyTo;
	private string $content;
	private array $replies;

	private function __construct()
	{
	}

	static public function create(int $postId, int $userId, string $content, int $replyId = null): ?Comment
	{
		return null;
	}

	static public function findById(int $id): ?Comment
	{
		return null;
	}

	static public function findAllReplies(int $replyId): array
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
