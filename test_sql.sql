USE Blogs;

DELETE FROM Users;
DELETE FROM Blogs;
DELETE FROM Posts;

INSERT INTO Users(email, name, password, username)
VALUES ("happygardener@happygardener.com", "The Happy Gardener", "iloveturnips", "happygardener"),
       ("recipesalamode@recipesalamode.com", "Recipes a la mode", "frenchvanilla", "frenchvanilla"),
       ("guitaristfreak@guitaristfreak.com", "Guitarist Freak", "tab", "guitaristfreak");

INSERT INTO Blogs(id, description, owner, title)
VALUES (0, "My quest to heal my depression through my turnip patch", "happygardener", "The Happy Gardener"),
       (1, "Ice cream can make almost anything better.", "frenchvanilla", "Recipes a la Mode"),
       (2, "E A D G B E", "guitaristfreak", "Guitarist Freak");

SET @gardenerId = 0;
SET @alamodeId = 1;
SET @guitarId = 2;
SET @loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.";

INSERT INTO Posts(author, blogId, content, uploaded, id, title)
VALUES ("happygardener", @gardenerId, @loremIpsum, 0, 0, , "Sowing my Past");




