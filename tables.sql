CREATE TABLE userdata(
	id int NOT NULL AUTO_INCREMENT,
	isadmin tinyint DEFAULT 0,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	authkey varchar(255) NOT NULL,
	accesstoken varchar(255) NOT NULL,
	userpic varchar(255) NULL,
	fname varchar(255) default NULL,
	lname varchar(255) default NULL,
	mname varchar(255) default NULL,
   PRIMARY KEY (id)
);

CREATE TABLE teacher(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,	
	age int not null,
	experience int not null,
	education varchar(255) default NULL,
   PRIMARY KEY (id)
);

CREATE TABLE student(
	id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,	
	age int not null,
	create_at int NOT NULL,	
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
	url varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	content varchar(255) NOT NULL,
	image varchar(255) NULL,
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
	language_id int NOT NULL,
	student_id int NOT NULL,
	content text NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE faq(
	id int NOT NULL AUTO_INCREMENT,
	language_id int NOT NULL,
	question varchar(255) NOT NULL,	
	answer varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE setting(
	id int NOT NULL AUTO_INCREMENT,	
	name varchar(255) NOT NULL,	
	value varchar(255) NOT NULL,
   PRIMARY KEY (id)
);
INSERT INTO `setting`(`id`, `name`, `value`) VALUES (1, 'email', '');
INSERT INTO `setting`(`id`, `name`, `value`) VALUES (2, 'phone', '');
INSERT INTO `setting`(`id`, `name`, `value`) VALUES (3, 'logo_img', '/web/img/logo.png');
INSERT INTO `setting`(`id`, `name`, `value`) VALUES (4, 'logo_txt', 'LanguageDom');

CREATE TABLE group_data(
	id int NOT NULL AUTO_INCREMENT,	
	name varchar(255) NOT NULL,	
	language_id int NOT NULL,
	student_ids varchar(255) NOT NULL,
	teacher_ids varchar(255) NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE application_request(
	id int NOT NULL AUTO_INCREMENT,	
	language_id int NOT NULL,
	student_id int NOT NULL,
	status int NOT NULL,
   PRIMARY KEY (id)
);

CREATE TABLE lesson(
	id int NOT NULL AUTO_INCREMENT,	
	group_id int NOT NULL,
	time int NOT NULL,
   PRIMARY KEY (id)
);
