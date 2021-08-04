-- ** CREATE TABLES **

-- Create table used to store car manufacturers
-- Although not needed now, can be useful for future proofing
CREATE TABLE cars_manufact
(
	cars_manufact VARCHAR(255),
	PRIMARY KEY(cars_manufact)
);
-- Create the car model table
CREATE TABLE cars_model 
(
	cars_manufact VARCHAR(255),
	car_model_id VARCHAR(255),
	model_price DECIMAL,
	PRIMARY KEY(car_model_id),
	FOREIGN KEY(cars_manufact) REFERENCES cars_manufact(cars_manufact)
);

CREATE TABLE car_colour 
(
	car_model_id VARCHAR(255),
	colour_id VARCHAR(255),
	colour_cost DECIMAL,
	FOREIGN KEY(car_model_id) REFERENCES cars_model(car_model_id)
);

CREATE TABLE car_trim 
(
	car_model_id varchar(255),
	trim_type_id varchar(255),
	trim_cost DECIMAL,
	FOREIGN KEY(car_model_id) REFERENCES cars_model(car_model_id)
);

CREATE TABLE car_interior 
(
	car_model_id varchar(255),
	interior_type_id varchar(255),
	interior_cost DECIMAL,
	FOREIGN KEY(car_model_id) REFERENCES cars_model(car_model_id),
	PRIMARY KEY (car_model_id, interior_type_id)
);

CREATE TABLE car_engine 
(
	car_model_id varchar(255),
	engine_capacity varchar(255),
	engine_cost DECIMAL,
	FOREIGN KEY(car_model_id) REFERENCES cars_model(car_model_id),
	PRIMARY KEY (car_model_id, engine_capacity)
);

CREATE TABLE car_wheels 
(
	car_model_id varchar(255),
	wheel_id varchar(255),
	wheel_price DECIMAL,
	FOREIGN KEY(car_model_id) REFERENCES cars_model(car_model_id),
	PRIMARY KEY (car_model_id, wheel_id)
);

-- We store parking sensors as a bit; 0 or 1 
-- This is effectively a boolean
CREATE TABLE parking_sensors 
(
	car_model_id varchar(255),
	sensor_bool varchar(255),
	sensor_cost DECIMAL,
	FOREIGN KEY(car_model_id) REFERENCES cars_model(car_model_id),
	PRIMARY KEY (car_model_id,sensor_bool)
);

-- User_access is used to store statuses, such as administrator or customer
CREATE TABLE users 
(
	user_id int NOT NULL AUTO_INCREMENT,
	email varchar(255),
	user_access varchar(255),
    primary key (user_id)
	
);
-- My plan is to create a hash out of the choices, so that we do not store multiple entries of the same config
-- In theory, this will allow Customer A and B to point to the same config, if they are identical.
-- This will be achieved by MD5 hashing all other entries and storting it as choice_hash.
CREATE TABLE created_choice 
(
	choice_id int NOT NULL AUTO_INCREMENT,
	car_model_id varchar(255),
	colour_id varchar(255),
	trim_type_id varchar(255),
	interior_type_id varchar(255),
	engine_capacity varchar(255),
	wheel_id varchar(255),
	sensor_bool varchar(255),
	choice_hash varchar(255),
	PRIMARY KEY (choice_id)
);

-- This is a linking table. I have used this incase hashing of configs is implemented.
CREATE TABLE user_choice 
(
	user_id int NOT NULL AUTO_INCREMENT,
	choice_id int,
	FOREIGN KEY (user_id) REFERENCES users(user_id),
	FOREIGN KEY (choice_id) REFERENCES created_choice(choice_id)
);


INSERT INTO cars_manufact VALUES ("Ford");

-- Focus 
INSERT INTO cars_model VALUES ("Ford","Focus",18000);

INSERT INTO car_trim VALUES ("Focus","Standard",0);
INSERT INTO car_trim VALUES ("Focus","EcoMax",600);
INSERT INTO car_trim VALUES ("Focus","Sport",1600);
INSERT INTO car_trim VALUES ("Focus","Titanium",2100);

INSERT INTO car_colour VALUES ("Focus","Red",0);
INSERT INTO car_colour VALUES ("Focus","Green",0);
INSERT INTO car_colour VALUES ("Focus","Metallic Blue",1000);

INSERT INTO car_interior VALUES ("Focus","Standard",0);
INSERT INTO car_interior VALUES ("Focus","Half Leather",500);
INSERT INTO car_interior VALUES ("Focus","Full Leather",1000);

INSERT INTO car_engine VALUES ("Focus","1.0l",0);
INSERT INTO car_engine VALUES ("Focus","2.0l",1500);
INSERT INTO car_engine VALUES ("Focus","2.2l",1750);

INSERT INTO car_wheels VALUES ("Focus","Standard",0);
INSERT INTO car_wheels VALUES ("Focus","16' Alloy",1500);
INSERT INTO car_wheels VALUES ("Focus","17' Executive Alloy",2000);
INSERT INTO car_wheels VALUES ("Focus","18' Sport Alloy",2500);

INSERT INTO parking_sensors VALUES ("Focus","Non installed",0);
INSERT INTO parking_sensors VALUES ("Focus","Installed",1000);

-- Fiesta rows
INSERT INTO cars_model VALUES ("Ford","Fiesta",14000);
INSERT INTO car_trim VALUES ("Fiesta","Standard",0);
INSERT INTO car_trim VALUES ("Fiesta","EcoMax",500);
INSERT INTO car_trim VALUES ("Fiesta","Sport",1500);
INSERT INTO car_trim VALUES ("Fiesta","Titanium",2000);

INSERT INTO car_colour VALUES ("Fiesta","Red",0);
INSERT INTO car_colour VALUES ("Fiesta","Green",0);
INSERT INTO car_colour VALUES ("Fiesta","Metallic Blue",1000);

INSERT INTO car_interior VALUES ("Fiesta","Standard",0);
INSERT INTO car_interior VALUES ("Fiesta","Half Leather",500);
INSERT INTO car_interior VALUES ("Fiesta","Full Leather",1000);

INSERT INTO car_engine VALUES ("Fiesta","1.0l",0);
INSERT INTO car_engine VALUES ("Fiesta","2.0l",1500);
INSERT INTO car_engine VALUES ("Fiesta","2.2l",1750);

INSERT INTO car_wheels VALUES ("Fiesta","Standard",0);
INSERT INTO car_wheels VALUES ("Fiesta","16' Alloy",1500);
INSERT INTO car_wheels VALUES ("Fiesta","17' Executive Alloy",2000);
INSERT INTO car_wheels VALUES ("Fiesta","18' Sport Alloy",2500);

INSERT INTO parking_sensors VALUES ("Fiesta","Non installed",0);
INSERT INTO parking_sensors VALUES ("Fiesta","Installed",1000);

-- Mondeo rows
INSERT INTO cars_model VALUES ("Ford","Mondeo",21500);
INSERT INTO car_trim VALUES ("Mondeo","Standard",0);
INSERT INTO car_trim VALUES ("Mondeo","Sport",750);
INSERT INTO car_trim VALUES ("Mondeo","Titanium",3000);

INSERT INTO car_colour VALUES ("Mondeo","Red",0);
INSERT INTO car_colour VALUES ("Mondeo","Green",0);
INSERT INTO car_colour VALUES ("Mondeo","Metallic Blue",1500);
INSERT INTO car_colour VALUES ("Mondeo","Matt Black",2000);

INSERT INTO car_interior VALUES ("Mondeo","Standard",500);
INSERT INTO car_interior VALUES ("Mondeo","Half Leather",1250);
INSERT INTO car_interior VALUES ("Mondeo","Full Leather",2000);

INSERT INTO car_engine VALUES ("Mondeo","1.4l",0);
INSERT INTO car_engine VALUES ("Mondeo","2.0l",1750);
INSERT INTO car_engine VALUES ("Mondeo","3.0l",3000);

INSERT INTO car_wheels VALUES ("Mondeo","Standard",0);
INSERT INTO car_wheels VALUES ("Mondeo","16' Alloy",1500);
INSERT INTO car_wheels VALUES ("Mondeo","17' Executive Alloy",2000);
INSERT INTO car_wheels VALUES ("Mondeo","18' Sport Alloy",2500);

INSERT INTO parking_sensors VALUES ("Mondeo","Non installed",0);
INSERT INTO parking_sensors VALUES ("Mondeo","Installed",1000);

