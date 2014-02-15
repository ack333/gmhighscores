CREATE TABLE `games` (
  `gameID` int(11) NOT NULL auto_increment COMMENT 'the ID of the game',
  `gameUser` int(11) NOT NULL COMMENT 'the userID of the creator of the game',
  `gameName` varchar(50) NOT NULL COMMENT 'the games name',
  `gameVerifyA` int(11) NOT NULL,
  `gameVerifyB` int(11) NOT NULL,
  `gameVerifyC` int(11) NOT NULL,
  `gameCreated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`gameID`)
) ENGINE=MyISAM AUTO_INCREMENT=3742 DEFAULT CHARSET=utf8 COMMENT='holds the games';

CREATE TABLE `highscores` (
  `hsID` int(11) NOT NULL auto_increment COMMENT 'The ID of the Highscores',
  `hsGame` int(11) NOT NULL COMMENT 'The game ID',
  `hsUser` varchar(50) NOT NULL COMMENT 'The users name',
  `hsScore` int(11) NOT NULL COMMENT 'The score',
  `hsCreated` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'The time the highscore was created',
  PRIMARY KEY  (`hsID`)
) ENGINE=MyISAM AUTO_INCREMENT=724671 DEFAULT CHARSET=utf8 COMMENT='Stores Highsore Data';

CREATE TABLE `users` (
  `userID` int(11) NOT NULL auto_increment COMMENT 'The user''s identification number',
  `userName` varchar(100) NOT NULL COMMENT 'The user''s username',
  `userPassword` varchar(100) NOT NULL COMMENT 'The user''s password.',
  `userEmail` varchar(100) NOT NULL COMMENT 'The user''s email.',
  `userCreated` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT 'The timestamp of the user''s account creation.',
  PRIMARY KEY  (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=4478 DEFAULT CHARSET=utf8;
