use GlobalGetaways;

ALTER TABLE `Miles` ADD CONSTRAINT `fk_Miles_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);
ALTER TABLE `Payment` ADD CONSTRAINT `fk_Payment_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);
ALTER TABLE `Admin` ADD CONSTRAINT `fk_Admin_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);
