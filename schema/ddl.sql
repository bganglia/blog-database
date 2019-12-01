CREATE DATABASE blogs;
USE Blogs;

CREATE TABLE User (
    username VARCHAR(100) PRIMARY KEY,
    name VARCHAR(100),
    password VARCHAR(100),
    email VARCHAR(100)
)

CREATE TABLE Blog (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    description VARCHAR(100),
    owner VARCHAR(100),
    FOREIGN KEY (owner) REFERENCES User (username)
);

CREATE TABLE Post (
    id INT PRIMARY KEY AUTO_INCREMENT,
    blogId INT,
    title VARCHAR(1000),
    author VARCHAR(100),
    content TEXT,
    FOREIGN KEY (author) REFERENCES User (username),
    FOREIGN KEY (blogId) REFERENCES Blog (id)
);

CREATE TABLE Comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    postId INT,
    author VARCHAR(100),
    content TEXT,
    FOREIGN KEY (author) REFERENCES User (username),
    FOREIGN KEY (postId) REFERENCES Post (id)
);

CREATE TABLE Tag (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30)
);

CREATE TABLE PostTag (
    postId INT,
    tagId INT,
    PRIMARY KEY (postId, tagId),
    FOREIGN KEY (tagId) REFERENCES Tag (id),
    FOREIGN KEY (postId) REFERENCES Post (id)
);