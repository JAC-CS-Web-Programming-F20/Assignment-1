<?php

namespace Assignment1\tests;

use Assignment1\Models\Category;
use Assignment1\Models\Comment;
use Assignment1\Models\Post;
use Assignment1\Models\User;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

abstract class Assignment1Test extends TestCase
{
	protected static $faker;

	public static function setUpBeforeClass(): void
	{
		self::$faker = Factory::create();
	}

	protected function generateUser(): User
	{
		return User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);
	}

	protected function generateCategory(User $user = null): Category
	{
		$user = $user === null ? $this->generateUser() : $user;

		return Category::create(
			$user->getId(),
			self::$faker->word,
			self::$faker->sentence
		);
	}

	protected function generatePost(): Post
	{
		$user = $this->generateUser();
		$category = $this->generateCategory();
		$postData = $this->generatePostData();

		return Post::create(
			$user->getId(),
			$category->getId(),
			$postData['title'],
			$postData['type'],
			$postData['content']
		);
	}

	protected function generatePostData(): array
	{
		$postData['title'] = self::$faker->word;

		if (rand(0, 1) === 0) {
			$postData['type'] = 'URL';
			$postData['content'] = self::$faker->url;
		} else {
			$postData['type'] = 'Text';
			$postData['content'] = self::$faker->paragraph();
		}

		return $postData;
	}

	protected function generateComment(int $replyId = null): Comment
	{
		$post = $this->generatePost();
		$user = $this->generateUser();

		return Comment::create(
			$post->getId(),
			$user->getId(),
			self::$faker->paragraph(),
			$replyId
		);
	}
}
