CREATE TABLE userdata(
	id int NOT NULL AUTO_INCREMENT,
	isadmin tinyint NOT NULL,
	teacher_id int NOT NULL,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	authkey varchar(255) NOT NULL,
	accesstoken varchar(255) NOT NULL,
	userpic varchar(255) NOT NULL,
   PRIMARY KEY (id)
);