/* Author: Alex Kerns
 * Date:   10-30-2019   
 */

CREATE TABLE users (
  user_id       Serial       PRIMARY KEY
, user_name     varchar(50)  UNIQUE      NOT NULL
, user_password	varchar(255)             NOT NULL
);
/*
INSERT INTO public.users(
  user_id, user_name, user_password)
  VALUES (?, ?, ?);
 */

CREATE TABLE room (
  room_id       Serial       PRIMARY KEY
, user_id       int          REFERENCES users(user_id)
, room_created  TIMESTAMP                              NOT NULL
, room_name     varchar(50)  UNIQUE                    NOT NULL
, room_password varchar(255)
);
/*
INSERT INTO public.room(
  room_id, user_id, room_created, room_name, room_password)
  VALUES (?, ?, NOW(), ?, ?);
 */

/*
SELECT 
  r.room_id
, r.room_name
, r.room_created
, u.user_name
, r.room_password 
FROM room r 
LEFT JOIN users u ON (r.user_id = u.user_id) 
ORDER BY r.room_id;
 */

CREATE TABLE message (
  user_id         int       REFERENCES users(user_id)
, room_id         int       REFERENCES room(room_id)
, message         Text                                NOT NULL
, message_created TIMESTAMP                           NOT NULL
);
/*
INSERT INTO public.message(
  user_id, room_id, message, message_created)
  VALUES (?, ?, ?, NOW());
 */

/*
SELECT 
  m.message
, m.message_created
, u.user_name 
FROM message m 
LEFT JOIN users u ON (m.user_id = u.user_id) 
WHERE m.room_id = ##;
 */