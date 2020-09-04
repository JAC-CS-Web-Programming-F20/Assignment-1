# Assignment 1 - Models 💾

- 💯**Worth**: 7.5%
- 📅**Due**: September X, 2020 @ 23:59
- 🙅🏽‍**Penalty**: Late submissions lose 10% per day to a maximum of 3 days. Nothing is accepted after 3 days and a grade of 0% will be given.

## 📥 Submission

TBA

## 🧪 Testing

TBA

## 🎯 Objectives

- **Write** models to represent real-world entities of the application.
- **Transact** data to and from a database using models.

## 🖋️ Description

Over the next several assignments, you will be building a Reddit clone web app. The web app will follow the *MVC architectural pattern*. In this assignment, you will be writing the **models** required to handle the data. The models' classes and methods will have to comply with specific requirements so that they may successfully pass the test suite. The test suite will be available for you to use as much as you want while developing the models.

Never been on Reddit? [Watch this video](https://www.youtube.com/watch?v=tlI022aUWQQ)!

## 📈 ERD

![ERD](ERD.png)

### 👤 User

A user account is required to be able to do anything (except browse) on the site. As a user, you can:

- Create categories
- Moderate categories
- Subscribe to categories
- Create posts (URL or text)
- Comment on posts
- Comment on other comments (i.e. replies)
- Vote on posts and/or comments (⬆ upvote or ⬇ downvote)
- Bookmark posts and/or comments

### 📁 Category

A category (aka subreddit) is a collection of posts. The content of the posts in a certain category should pertain to the category's topic.

For example, the Star Wars category should contain posts about Star Wars. The Star Trek category should contain posts about Star Trek. If someone tried to post a Star Trek article in a Star Wars category, that post would probably get many downvotes from other users.

If a post is too inappropriate for a category, then the moderators of that category have the power of deleting that post.

### 📝 Post

A post can either be text (ex. your opinion on the last Star Wars movie) or a URL to another site (ex. a link to a Star Wars trailer on YouTube). Both text and URL posts have a title. Only the content of a text post can be edited by the user who posted it.

Users can upvote or downvote the post based on whether they think it's a good post or not. The order of the posts shown to the user will usually be sorted by the net votes (upvotes minus downvotes) which leads to a feed where the content is curated by the community.

If a user really likes a post and wants to save it for future reference, they may bookmark the post.

### 📣 Comment

A comment can be left on a post (ex. "Your opinion about \<*the latest Star Wars movie*\> is wrong and here's why!") or on another comment (ex. "Your opinion about \<*why the original opinion about the latest Star Wars movie is wrong*\> is wrong, and here's why!").

Just like posts, user can upvote or downvote comments they think are conducive to the conversation. Just like with posts, the most upvoted comments float to the top.

If a user really likes a comment and wants to save it for future reference, they may bookmark the comment.
