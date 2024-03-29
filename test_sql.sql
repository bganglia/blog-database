INSERT INTO Users(email, name, password, username)
VALUES ("happygardener@happygardener.com", "The Happy Gardener", "iloveturnips", "happygardener"),
       ("recipesalamode@recipesalamode.com", "Recipes a la mode", "frenchvanilla", "frenchvanilla"),
       ("guitaristfreak@guitaristfreak.com", "Guitarist Freak", "tab", "guitaristfreak");

INSERT INTO Blogs(id, description, owner, title)
VALUES (1, "My quest to heal my depression through my turnip patch", "happygardener", "The Happy Gardener"),
       (2, "Ice cream can make almost anything better.", "frenchvanilla", "Recipes a la Mode"),
       (3, "E A D G B E", "guitaristfreak", "Guitarist Freak");

SET @gardenerId = 1;
SET @alamodeId = 2;
SET @guitarId = 3;
SET @loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.";

INSERT INTO Posts(author, blogId, content, id, title)
VALUES ("happygardener", @gardenerId, @loremIpsum, 1, "Gardener Post 1"),
       ("happygardener", @gardenerId, @loremIpsum, 2, "Gardener Post 2"),
       ("happygardener", @gardenerId, @loremIpsum, 3, "Gardener Post 3"),
       ("frenchvanilla", @alamodeId, @loremIpsum, 4, "Ice Cream Post 1"),
       ("frenchvanilla", @alamodeId, @loremIpsum, 5, "Ice Cream Post 2"),
       ("frenchvanilla", @alamodeId, @loremIpsum, 6, "Ice Cream Post 3"),
       ("guitaristfreak", @guitarId, @loremIpsum, 7, "Guitar Post 1"),
       ("guitaristfreak", @guitarId, @loremIpsum, 8, "Guitar Post 2"),
       ("guitaristfreak", @guitarId, @loremIpsum,  9, "Guitar Post 3");
