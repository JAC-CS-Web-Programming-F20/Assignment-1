<?php

namespace Assignment1\tests;

use Assignment1\Models\User;
use Assignment1\Database\Connection;

final class UserTest extends Assignment1Test
{
	public function testUserWasCreatedSuccessfully(): void
	{
		$this->assertInstanceOf(User::class, $this->generateUser());
	}

	public function testUserWasNotCreatedWithBlankFields(): void
	{
		$userBlankUsername = User::create(
			'',
			self::$faker->email,
			self::$faker->password
		);

		$this->assertNull($userBlankUsername);

		$userBlankEmail = User::create(
			self::$faker->username,
			'',
			self::$faker->password
		);

		$this->assertNull($userBlankEmail);

		$userBlankPassword = User::create(
			self::$faker->username,
			self::$faker->email,
			''
		);

		$this->assertNull($userBlankPassword);
	}

	public function testUserWasNotCreatedWithDuplicateEmail(): void
	{
		$email = self::$faker->email;

		User::create(
			self::$faker->username,
			$email,
			self::$faker->password
		);

		$user = User::create(
			self::$faker->username,
			$email,
			self::$faker->password
		);

		$this->assertNull($user);
	}

	public function testUserWasFoundById(): void
	{
		$username = self::$faker->username;
		$newUser = User::create(
			$username,
			self::$faker->email,
			self::$faker->password
		);

		$retreivedUser = User::findById($newUser->getId());

		$this->assertEquals(
			$retreivedUser->getUsername(),
			$newUser->getUsername()
		);
	}

	public function testUserWasNotFoundByWrongId(): void
	{
		$newUser = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);

		$retreivedUser = User::findById($newUser->getId() + 1);

		$this->assertNull($retreivedUser);
	}

	public function testUserWasFoundByEmail(): void
	{
		$email = self::$faker->email;
		$newUser = User::create(
			self::$faker->username,
			$email,
			self::$faker->password
		);

		$retreivedUser = User::findByEmail($newUser->getEmail());

		$this->assertEquals(
			$retreivedUser->getEmail(),
			$newUser->getEmail()
		);
	}

	public function testUserWasNotFoundByWrongEmail(): void
	{
		$email = self::$faker->email;
		User::create(
			self::$faker->username,
			$email,
			self::$faker->password
		);

		$retreivedUser = User::findByEmail($email . '.wrong');

		$this->assertNull($retreivedUser);
	}

	public function testUserWasUpdatedSuccessfully(): void
	{
		$oldUser = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);

		$newUsername = self::$faker->name;

		$oldUser->setUsername($newUsername);
		$this->assertNull($oldUser->getEditedAt());
		$this->assertTrue($oldUser->save());

		$retreivedUser = User::findById($oldUser->getId());
		$this->assertEquals($newUsername, $retreivedUser->getUsername());
		$this->assertNotNull($retreivedUser->getEditedAt());
	}

	public function testUserWasNotUpdatedWithInvalidFields(): void
	{
		$user1 = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);

		$user1->setUsername('');
		$this->assertFalse($user1->save());

		$user2 = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);

		$user2->setEmail('');
		$this->assertFalse($user2->save());

		$user3 = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);

		$user3->setPostScore(-1);
		$this->assertFalse($user3->save());

		$user4 = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);

		$user4->setCommentScore(-1);
		$this->assertFalse($user4->save());
	}

	public function testUserWasDeletedSuccessfully(): void
	{
		$user = User::create(
			self::$faker->username,
			self::$faker->email,
			self::$faker->password
		);
		$this->assertNull($user->getDeletedAt());
		$this->assertTrue($user->delete());

		$retreivedUser = User::findById($user->getId());
		$this->assertNotNull($retreivedUser->getDeletedAt());
	}

	public function tearDown(): void
	{
		$database = new Connection();
		$connection = $database->connect();
		$statement = $connection->prepare("DELETE FROM `user`");
		$statement->execute();
		$statement->close();
	}
}
