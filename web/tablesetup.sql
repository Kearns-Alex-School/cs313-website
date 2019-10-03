/* Author: Alex Kerns
 * Date:   10-01-2019
 * Notes:  heroku pg:psql to launch into Postgresql
 *         Run a file from CLI
 *            mydb=> \i basics.sql    
 */

CREATE TABLE user (
  user_id 		    Serial		PRIMARY KEY
, user_name		    varchar(50)	UNIQUE		NOT NULL
, user_password	    varchar(50)			 	NOT NULL
, user_email 	    varchar(50)			 	NOT NULL
);
/*
INSERT INTO user (
  user_name
, user_password
, user_email
) VALUES (
  'NAME'
, 'PASS'
, 'EMAIL' );
 */

CREATE TABLE room (
  room_id			Serial		PRIMARY KEY
, user_id			int		    REFERENCES User(user_id)
, room_created	    TIMESTAMP			 	NOT NULL
, room_name		    varchar(50) UNIQUE 		NOT NULL
, room_password	    varchar(50)
);
/*
INSERT INTO room (
  user_id
, room_created
, room_name
, room_password
) VALUES (
  USER_ID
, NOW()
, 'NAME'
, 'PASS');
 */

/*
SELECT 
  r.room_id
, r.room_name
, r.room_created
, u.user_name
, r.room_password 
FROM room r 
LEFT JOIN user u ON (r.user_id = u.user_id) 
ORDER BY r.room_id;
 */

CREATE TABLE messages (
  user_id			int	        REFERENCES user(user_id)
, room_id			int	        REFERENCES room(room_id)
, message 			Text                    NOT NULL
, message_created   TIMESTAMP               NOT NULL
);
/*
INSERT INTO messages VALUES (
  USER_ID
, ROOM_ID
, 'MESSAGE'
, NOW() );
 */

/*
SELECT 
  m.message
, m.message_created
, u.user_name 
FROM messages m 
LEFT JOIN user u ON (m.user_id = u.user_id) 
WHERE m.room_id = 1;
 */