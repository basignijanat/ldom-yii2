CREATE TABLE userdata(
	id int NOT NULL AUTO_INCREMENT,
	is_admin tinyint NOT NULL,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	authkey varchar(255) NOT NULL,
	accesstoken varchar(255) NOT NULL,
	userpic varchar(255) NOT NULL,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	mname varchar(255) default NULL,
   PRIMARY KEY (id)
);

CREATE TABLE teacher(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,	
	age int NOT NULL,
	experience int NOT NULL,
	education varchar(255) NOT NULL,
	eduprogram_ids varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE student(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	name varchar(255) NOT NULL,
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
	value int NOT NULL,
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
	language_id int NOT NULL,
	teacher_ids int NOT NULL,
	prices int NULL,
   PRIMARY KEY (id)
);

CREATE TABLE comment(
	id int NOT NULL AUTO_INCREMENT,
	form_id int NOT NULL,
	student_id int NOT NULL,
	content text NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE faq(
	id int NOT NULL AUTO_INCREMENT,
	eduform_id int NOT NULL,
	question varchar(255) NOT NULL,	
	answer varchar(255) NOT NULL,
   PRIMARY KEY (id)
);