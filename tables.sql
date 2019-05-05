CREATE TABLE userdata(
	id int NOT NULL AUTO_INCREMENT,
	isadmin tinyint NOT NULL,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	authkey varchar(255) NOT NULL,
	accesstoken varchar(255) NOT NULL,
	userpic varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE teacher(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	username varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	age int NOT NULL,
	expirience int NOT NULL,
	education varchar(255) NOT NULL,
	eduprogram_ids varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE student(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	eduform_ids varchar(255) NOT NULL,	
   PRIMARY KEY (id)
);

CREATE TABLE userlang(
	id int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	shortname varchar(255) NOT NULL,
	val varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE price(
	id int NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,	
	val int NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE lang(
	id int NOT NULL AUTO_INCREMENT,
	userlang_id int NOT NULL,
	meta_title varchar(255) NOT NULL,
	meta_description varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	content varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE eduform(
	id int NOT NULL AUTO_INCREMENT,
	meta_title varchar(255) NOT NULL,
	meta_description varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	content varchar(255) NOT NULL,
	language_id
	teacher_id
   PRIMARY KEY (id)
);