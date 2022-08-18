CREATE TABLE sales (
    sale_id int(22) NOT NULL AUTO_INCREMENT,
    customer_id int(11),
    invoice_amount VARCHAR(50),
    amount_recieved VARCHAR(50),
    PRIMARY KEY (sale_id)
);