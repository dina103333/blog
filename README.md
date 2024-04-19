# Blog System

## Introduction

This is a random question on Algorithms , Database , Data structure and blog system , built using Laravel web framework and a relational database. The system is designed to manage posts and there reviews .


## Technology Used

- Laravel.

## Installation and Usage

### Running the Project

1. Clone the repository to your local machine using `git clone`.
2. To access blog system run `cd blog`.
3. install the required dependencies by running `php composer update`.
4. Create a copy of the `.env.example` file and name it `.env` run`cp .env.example .env`.
5. Generate Laravel application key run `php php artisan key:generate`.
6. Run the migrations and seed the database using `php artisan migrate:fresh --seed`.
7. Run the project using `php artisan migrate:fresh --seed`.

### Running the Test Cases

1. Run the test cases using `php artisan test`.

# API Documentation

## Create a Post Endpoint

### POST ```/api/posts```

Creates a new post in the system.

**Request Body:**

```json
{
    "title": "test",
    "body":"test",
    "user_id":"1"
}
```

## List User Posts Endpoint

### GET ```/api/posts/user/{user_id}```

List User Posts Of the system.

##  List Top Posts Endpoint

### GET ```/api/posts/top```

Get All Top Posts of the system.

## Review Endpoint

### POST ```/api/posts/{post_id}/reviews```

Add a review to Post.

**Request Body:**

```json
{
    "rating":1,
    "comment": "test",
    "user_id": 5,
}
```
