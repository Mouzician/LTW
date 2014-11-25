CREATE TABLE users ( 
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username NVARCHAR2(20) NOT NULL,
	password NVARCHAR2(20) NOT NULL,
	email NVARCHAR2(40) NOT NULL

);

INSERT INTO users VALUES (1,'mrbool', 'mrbool123', 'andre@gmail.com');