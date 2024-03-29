DROP TABLE IF EXISTS Polls;
DROP TABLE IF EXISTS Questions;
DROP TABLE IF EXISTS AnswerUser;
DROP TABLE IF EXISTS Answers;
DROP TABLE IF EXISTS users;
 
CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username NVARCHAR2(20) NOT NULL,
        password NVARCHAR2(20) NOT NULL,
        email NVARCHAR2(40) NOT NULL
 
);
 
CREATE TABLE Polls (
        idPoll INTEGER PRIMARY KEY AUTOINCREMENT,
        idUser INTEGER NOT NULL,
        image NVARCHAR2(200) NOT NULL,
        question NVARCHAR2(200) NOT NULL,
        private INTEGER,
        FOREIGN KEY(idUser) REFERENCES users(id)
);
 
CREATE TABLE  AnswerUser(
        idAnswerUser INTEGER PRIMARY KEY AUTOINCREMENT,
        idAnswer INTEGER REFERENCES Answers(idAnswer),
        idUser INTEGER REFERENCES users(id)
);
 
CREATE TABLE Answers(
        idAnswer INTEGER PRIMARY KEY AUTOINCREMENT,
        idPoll INTEGER NOT NULL,
        content NVARCHAR2(200) NOT NULL,
        FOREIGN KEY(idPoll) REFERENCES Polls(idPoll)
);