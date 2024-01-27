
# API Documentation for Blog Platform

## Overview
This document outlines the API endpoints for a basic blog platform. The APIs are designed to handle various functionalities related to blog posts and comments. Below are the details of the available endpoints, including request types, parameters, and expected responses.

## Endpoints

### Authenticated User
- **Endpoint**: `/user`
- **Method**: `GET`
- **Middleware**: `auth:sanctum`
- **Description**: Returns the details of the authenticated user.
- **Parameters**: None
- **Response**: User details

### Blog Posts
- **Endpoint**: `/posts`
- **Method**: `POST`
- **Description**: Creates a new blog post.
- **Parameters**: Title, content, etc. (to be specified)
- **Response**: Details of the created post

- **Endpoint**: `/posts`
- **Method**: `GET`
- **Description**: Retrieves a list of blog posts.
- **Parameters**: None
- **Response**: List of posts

- **Endpoint**: `/posts/{id}`
- **Method**: `PUT`/`PATCH`
- **Description**: Updates an existing blog post.
- **Parameters**: Post ID, updated content, etc. (to be specified)
- **Response**: Updated post details

- **Endpoint**: `/posts/{id}`
- **Method**: `DELETE`
- **Description**: Deletes a blog post.
- **Parameters**: Post ID
- **Response**: Confirmation of deletion

### Comments
- **Endpoint**: `/posts/{id}/comments`
- **Method**: `POST`
- **Description**: Adds a comment to a blog post.
- **Parameters**: Post ID, comment content, etc. (to be specified)
- **Response**: Details of the added comment

- **Endpoint**: `/posts/{id}/comments`
- **Method**: `GET`
- **Description**: Retrieves comments for a blog post.
- **Parameters**: Post ID
- **Response**: List of comments for the post
