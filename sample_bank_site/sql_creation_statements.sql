-- DB name is bankco

-- Create users Table
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb


-- Create transactions Table
CREATE TABLE `transactions` (
  `transaction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `account_transaction_ID` int(11) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`transaction_ID`),
  KEY `FK_UserTransaction` (`account_transaction_ID`),
  CONSTRAINT `FK_UserTransaction` FOREIGN KEY (`account_transaction_ID`) REFERENCES `account` (`account_primary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4


-- Create accounts table
CREATE TABLE `account` (
  `account_primary_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_total` int(11) DEFAULT NULL,
  `user_account_id` int(11) NOT NULL,
  PRIMARY KEY (`account_primary_id`),
  KEY `user_account_id` (`user_account_id`),
  CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_account_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1029 DEFAULT CHARSET=utf8mb4