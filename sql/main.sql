
CREATE TABLE `waiting_users` (
    `id` VARCHAR(12) NOT NULL PRIMARY KEY,            
    `waitingid` VARCHAR(8) NOT NULL,                  
    `ipadd` VARCHAR(45) NOT NULL,                     
    `email` VARCHAR(255) NOT NULL UNIQUE,             
    `password` VARCHAR(255) NOT NULL,                 
    `filepath` VARCHAR(255) NOT NULL,                 
    `current_datetime` DATETIME NOT NULL,             
    `order_date` DATETIME NOT NULL,                   
    KEY `waitingid_index` (`waitingid`)               
);




create table accepted_users(
    id VARCHAR(255) NOT NULL,
    waitingid VARCHAR(255) NOT NULL

);