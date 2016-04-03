USE cupcak10_1

CREATE TABLE members (
	id INTEGER NOT NULL auto_increment,
	firstname varchar(100) NOT NULL,
	lastname varchar(100) NOT NULL,
	email varchar(200) NOT NULL,
	phone varchar(100) NOT NULL,
	birthday date(100) NOT NULL,
	password varchar(100) NOT NULL,
	points int(255) default NULL,
	PRIMARY KEY (id)
) 

CREATE TABLE receipts (
	id integer NOT NULL auto_increment,
	number int(50) NOT NULL,
	count int(1) default NULL,
	value int(20) NOT NULL,
	PRIMARY KEY (id)
)

CREATE TABLE orders (
	id integer NOT NULL auto_increment,
	firstname varchar(100) NOT NULL,
	lastname varchar(100) NOT NULL,
	email varchar(200) NOT NULL,
	phone varchar(100) NOT NULL,
	odate date(100) NOT NULL,
	about varchar(30) NOT NULL,
	details longtext(500) NOT NULL,
	PRIMARY KEY (id)
)
	
	
	