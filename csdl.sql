CREATE TABLE users (
	user_id int AUTO_INCREMENT PRIMARY KEY,
    user_name varchar(255),
    user_password varchar(255),
    user_phone varchar(255),
    user_address varchar(255)
);

CREATE TABLE admin (
	admin_name varchar(255) PRIMARY KEY,
    admin_password varchar(255)
);

CREATE TABLE pet (
	pet_id int AUTO_INCREMENT PRIMARY KEY,
    pet_description varchar(255),
    pet_category_id varchar(255),
    pet_img varchar(255),
    user_id int
);

CREATE TABLE pet_product (
	pet_prod_id varchar(255) PRIMARY KEY,
    pet_prod_name varchar(255),
    pet_prod_detail varchar(255),
    pet_prod_price double,
    pet_prod_origin varchar(255),
    pet_prod_image varchar(255),
    pet_prod_quantity int
);

CREATE TABLE pet_category (
	pet_category_id varchar(10) PRIMARY KEY,
    pet_category_name varchar(255),
    user_id int
);

CREATE TABLE orders(
	order_id varchar(10) PRIMARY KEY,
    order_date date,
    order_total int,
    order_numberOfItem int,
    user_id int,
    pet_prod_id varchar(255)
);

CREATE TABLE order_detail (
	order_id varchar(10),
    pet_prod_id varchar(255),
    order_detail_quantity int,
    total double,
    user_id int
);

CREATE TABLE service(
	service_id varchar(10) PRIMARY KEY,
    service_name varchar(255),
    service_detail varchar(255),
    service_fee double,
    service_date date,
    user_id int,
    pet_id int
);

ALTER TABLE order_detail
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE orders
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE pet
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE service
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE pet_category
ADD FOREIGN KEY (user_id) REFERENCES users(user_id);

ALTER TABLE order_detail
ADD FOREIGN KEY (order_id) REFERENCES orders(order_id);

ALTER TABLE order_detail
ADD FOREIGN KEY (pet_prod_id) REFERENCES pet_product(pet_prod_id);

ALTER TABLE orders
ADD FOREIGN KEY (pet_prod_id) REFERENCES pet_product(pet_prod_id);

ALTER TABLE pet
ADD FOREIGN KEY (pet_category_id) REFERENCES pet_category(pet_category_id);

ALTER TABLE service
ADD FOREIGN KEY (pet_id) REFERENCES pet(pet_id);

ALTER TABLE users
ADD user_email varchar(255);

ALTER TABLE users
ADD UNIQUE (user_email);

INSERT into admin (admin_name, admin_password) VALUES ("admin","admin"); 