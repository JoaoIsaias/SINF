.headers ON
.mode column
.nullvalue NULL

CREATE TABLE IF NOT EXISTS WishList (
	clientId TEXT,
	productId TEXT,
	PRIMARY KEY (clientId, productId)
);

CREATE TABLE IF NOT EXISTS ShoppingCart (
	clientId TEXT,
	productId TEXT,
	quantity INTEGER,
	PRIMARY KEY (clientId, productId)
);

-- INSERT INTO WishList VALUES ('cli1', 'art1');
-- INSERT INTO WishList VALUES ('cli1', 'art2');
-- INSERT INTO WishList VALUES ('cli1', 'art3');
-- INSERT INTO WishList VALUES ('cli1', 'art4');
-- INSERT INTO WishList VALUES ('cli2', 'art2');
-- INSERT INTO WishList VALUES ('cli3', 'art3');
-- INSERT INTO WishList VALUES ('cli4', 'art4');

-- INSERT INTO ShoppingCart VALUES ('cli1', 'art1', 1);
-- INSERT INTO ShoppingCart VALUES ('cli1', 'art2', 2);
-- INSERT INTO ShoppingCart VALUES ('cli1', 'art3', 3);
-- INSERT INTO ShoppingCart VALUES ('cli1', 'art4', 4);
-- INSERT INTO ShoppingCart VALUES ('cli2', 'art2', 2);
-- INSERT INTO ShoppingCart VALUES ('cli3', 'art3', 3);
-- INSERT INTO ShoppingCart VALUES ('cli4', 'art4', 4);

-- SELECT * FROM WishList;
-- SELECT * FROM ShoppingCart;

-- DELETE FROM WishList WHERE clientId = 'cli1' AND productId = 'art1';
-- DELETE FROM ShoppingCart WHERE clientId = 'cli1' AND productId = 'art1';

-- SELECT * FROM WishList;
-- SELECT * FROM ShoppingCart;
