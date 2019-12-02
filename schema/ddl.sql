CREATE DATABASE Blogs;
USE Blogs;

CREATE TABLE Users (
    username VARCHAR(100) PRIMARY KEY,
    name VARCHAR(100),
    password VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE Blogs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    description VARCHAR(100),
    owner VARCHAR(100),
    FOREIGN KEY (owner) REFERENCES Users (username)
);

CREATE TABLE Posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    blogId INT,
    title VARCHAR(1000),
    author VARCHAR(100),
    content TEXT,
    FOREIGN KEY (author) REFERENCES Users (username),
    FOREIGN KEY (blogId) REFERENCES Blogs (id)
);

CREATE TABLE Comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    postId INT,
    author VARCHAR(100),
    content TEXT,
    FOREIGN KEY (author) REFERENCES Users (username),
    FOREIGN KEY (postId) REFERENCES Posts (id)
);

CREATE TABLE Tags (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30)
);

CREATE TABLE PostTags (
    postId INT,
    tagId INT,
    PRIMARY KEY (postId, tagId),
    FOREIGN KEY (tagId) REFERENCES Tags (id),
    FOREIGN KEY (postId) REFERENCES Posts (id)
);
