CREATE TABLE `rep_tax_cat_client` (
id int AUTO_INCREMENT,
representative_id int NOT NULL,
tax_category_id int NOT NULL,
client_id int NOT NULL,
rep_name VARCHAR(30) NOT NULL,
PRIMARY KEY (id)

-- CONSTRAINT fk_representative_id FOREIGN KEY (representative_id) REFERENCES user(id)
-- CONSTRAINT tax_category_id FOREIGN KEY (tax_category_id) REFERENCES feetp(id),
-- CONSTRAINT client_id FOREIGN KEY (client_id) REFERENCES client(id)
)