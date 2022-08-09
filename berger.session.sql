CREATE TABLE customer (
    customer_id int(11) NOT NULL AUTO_INCREMENT,
    customer_name varchar(120),
    customer_phone int(50),
    customer_address VARCHAR(150),
    customer_city VARCHAR(50),
    PRIMARY KEY (customer_id)
);