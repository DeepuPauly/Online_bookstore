/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - online_book_store
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_book_store` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `online_book_store`;

/*Table structure for table `tbl_book` */

DROP TABLE IF EXISTS `tbl_book`;

CREATE TABLE `tbl_book` (
  `Book_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Subcat_Id` int(5) DEFAULT NULL,
  `Book_Title` varchar(100) NOT NULL,
  `Book_Author` varchar(100) NOT NULL,
  `Book_Publisher` varchar(100) NOT NULL,
  `Book_Publication_Date` varchar(100) NOT NULL,
  `Book_Description` varchar(1000) NOT NULL,
  `Book_Price` varchar(100) NOT NULL,
  `Book_Status` tinyint(1) NOT NULL,
  `Profit_Percentage` varchar(100) NOT NULL,
  `Book_Img` varchar(2000) NOT NULL,
  `Stock` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Book_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_book` */

insert  into `tbl_book`(`Book_Id`,`Subcat_Id`,`Book_Title`,`Book_Author`,`Book_Publisher`,`Book_Publication_Date`,`Book_Description`,`Book_Price`,`Book_Status`,`Profit_Percentage`,`Book_Img`,`Stock`) values 
(1,4,'The Fault in Our Stars','John Green','Dutton Books','11/01/2012','The Fault in Our Stars is a poignant romance fiction novel penned by John Green. It chronicles the extraordinary love story between two teenagers, Hazel Grace Lancaster and Augustus Waters, who meet at a cancer support group. Both facing life-threatening illnesses, they form a deep and profound connection that transcends their physicalÂ challenges.','440',1,'10','images/653164b43c80d.jpg','5'),
(2,3,'The Martian','Andy Weir','Ballantine Books','01/01/1900','The Martian is a gripping science fiction novel written by Andy Weir. It tells the thrilling tale of astronaut Mark Watney, who becomes stranded on the desolate and unforgiving surface of Mars during a manned mission. Presumed dead and left behind by his crew, Mark faces insurmountable odds as he battles to survive in the harsh MartianÂ environment.','1080',1,'8','images/65315bc45a1df.jpg','7'),
(3,3,'Dune','Frank Herbert','Chiltton Books','07/07/1965','Dune is a groundbreaking science fiction novel written by Frank Herbert. Set in a distant future where interstellar travel and complex political intrigue reign. Dune is a masterful blend of science fiction and fantasy. At its heart is the desert planet of Arrakis, the only known source of the spice melange, the most valuable substance inÂ theÂ universe.','555',1,'11','images/65315b23e84b9.jpg','6'),
(4,8,'Wings of Fire','APJ Abdul Kalam','Universities Press','01/09/1999','Wings of Fire is a captivating and bestselling book series written by Dr. A.P.J. Abdul Kalam, the former President of India, along with Arun Tiwari. The series offers a glimpse into Dr. Kalam life, his dreams, and his vision for the nation. Its a compelling autobiographical account that traces his journey from a humble background to becoming a world-renowned scientist and the PresidentÂ ofÂ India','345',1,'15','images/65315b81b6615.jpg','4'),
(7,4,'The Love Hypothesis','Ali Hazelwood','Berkley Books','14/09/2021','The Love Hypothesis is a contemporary romance novel written by Ali Hazelwood. The story revolves around Olive Smith, a passionate and ambitious grad student in biology, and Adam Carlsen, a charming and popular professor. To avoid interference with her academic career, Olive proposes a fake relationship with Adam based on a love hypothesis to improve her socialÂ standing.','4480',1,'12','images/65315bf03b038.jpg','4');

/*Table structure for table `tbl_card` */

DROP TABLE IF EXISTS `tbl_card`;

CREATE TABLE `tbl_card` (
  `Card_Id` int(100) NOT NULL AUTO_INCREMENT,
  `Cust_Id` int(100) DEFAULT NULL,
  `Card_No` varchar(100) NOT NULL,
  `Card_Holder` varchar(100) NOT NULL,
  `Exp_Date` varchar(100) NOT NULL,
  PRIMARY KEY (`Card_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_card` */

insert  into `tbl_card`(`Card_Id`,`Cust_Id`,`Card_No`,`Card_Holder`,`Exp_Date`) values 
(1,1,'1234123412341234','Sneha Seb','2030/09'),
(2,2,'8900890089008900','Asra Mehrin','2030/09'),
(4,4,'2342342342342342','Meera Krishna','2030/13'),
(5,5,'5555555555555555','sumith','26/06');

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `Cat_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cat_Name` varchar(100) NOT NULL,
  `Cat_Description` varchar(500) NOT NULL,
  `cat_status` varchar(10) NOT NULL,
  PRIMARY KEY (`Cat_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`Cat_Id`,`Cat_Name`,`Cat_Description`,`cat_status`) values 
(1,'Fiction','Through storytelling, fiction books offer readers the opportunity to escape into different time periods, cultures, and perspectives, fostering empathy and understanding while providing entertainment and insight into the human condition.','1'),
(2,'Non-Fiction','Non-fiction books are informative and enlightening works that provide factual knowledge and insights into various aspects of the real world.','1'),
(6,'Literature','Literature books represent a rich and diverse world of written artistry. These works, often considered timeless classics or modern masterpieces, delve into the depths of human experience and emotion.','1'),
(7,'Colouring Books','colouring books for children','1'),
(5,'Children and Teen','Children and teen books encompass a diverse and engaging range of literature tailored to young readers, from early childhood through the teenage years. These books are thoughtfully crafted to entertain, educate, and inspire, catering to the specific interests and developmental stages of children and adolescents.','1');

/*Table structure for table `tbl_childcart` */

DROP TABLE IF EXISTS `tbl_childcart`;

CREATE TABLE `tbl_childcart` (
  `childcart_id` int(5) NOT NULL AUTO_INCREMENT,
  `mastcart_Id` int(5) NOT NULL,
  `Book_Id` int(5) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `added_date` varchar(100) NOT NULL,
  `child_totamt` varchar(100) NOT NULL,
  PRIMARY KEY (`childcart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_childcart` */

insert  into `tbl_childcart`(`childcart_id`,`mastcart_Id`,`Book_Id`,`quantity`,`added_date`,`child_totamt`) values 
(1,1,1,'1','2023-10-23','440'),
(2,2,2,'7','2023-10-23','1080'),
(3,3,3,'1','2023-10-23','555'),
(4,4,7,'1','2023-10-24','4480'),
(5,5,2,'1','2023-10-24','1080'),
(6,6,3,'1','2023-10-24','555');

/*Table structure for table `tbl_courier` */

DROP TABLE IF EXISTS `tbl_courier`;

CREATE TABLE `tbl_courier` (
  `Courier_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Staff_Id` int(5) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Cs_Name` varchar(100) NOT NULL,
  `Cs_Phno` varchar(100) NOT NULL,
  `Cs_City` varchar(100) NOT NULL,
  `Cs_Street` varchar(100) NOT NULL,
  `Cs_Dist` varchar(100) NOT NULL,
  `Cs_Pin` decimal(10,0) DEFAULT NULL,
  `Cs_Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Courier_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_courier` */

insert  into `tbl_courier`(`Courier_Id`,`Staff_Id`,`Username`,`Cs_Name`,`Cs_Phno`,`Cs_City`,`Cs_Street`,`Cs_Dist`,`Cs_Pin`,`Cs_Status`) values 
(1,0,'dtdc@gmail.com','DTDC','9876789876','Kakkanad','Kakkanad','Ernakulam',678987,1),
(2,0,'bluedart@gmail.com','Blue Dart','9876567898','Kakkanad','Kakkanad','Ernakulam',678987,1),
(3,1,'fedex@gmail.com','FedEx','9876543567','Palarivottom','Ernakulam','Palarivottom',686887,1);

/*Table structure for table `tbl_courier_assign` */

DROP TABLE IF EXISTS `tbl_courier_assign`;

CREATE TABLE `tbl_courier_assign` (
  `Courier_Assign_Id` int(11) NOT NULL AUTO_INCREMENT,
  `mastcart_id` int(11) DEFAULT NULL,
  `Courier_Id` int(11) DEFAULT NULL,
  `Courier_Assign_Date` date NOT NULL,
  PRIMARY KEY (`Courier_Assign_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_courier_assign` */

insert  into `tbl_courier_assign`(`Courier_Assign_Id`,`mastcart_id`,`Courier_Id`,`Courier_Assign_Date`) values 
(1,1,1,'2023-10-23'),
(2,1,2,'2023-10-23'),
(3,2,3,'2023-10-23'),
(4,1,3,'2023-10-23'),
(5,1,1,'2023-10-23'),
(6,1,2,'2023-10-23'),
(7,3,2,'2023-10-23'),
(8,1,1,'2023-10-23'),
(9,3,1,'2023-10-23'),
(10,1,1,'2023-10-23'),
(11,3,2,'2023-10-23'),
(12,3,1,'2023-10-23'),
(13,1,1,'2023-10-23'),
(14,1,2,'2023-10-23'),
(15,1,1,'2023-10-23'),
(16,6,3,'2023-10-24'),
(17,5,2,'2023-10-24'),
(18,4,1,'2023-10-24'),
(19,5,1,'2023-10-24'),
(20,1,3,'2023-10-24'),
(21,6,2,'2023-10-24'),
(22,6,2,'2023-10-24'),
(23,5,1,'2023-10-24');

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `Cust_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) DEFAULT NULL,
  `C_Fname` varchar(100) NOT NULL,
  `C_Lname` varchar(100) NOT NULL,
  `C_Address` varchar(100) NOT NULL,
  `C_City` varchar(100) NOT NULL,
  `C_Dist` varchar(100) NOT NULL,
  `C_Street` varchar(100) NOT NULL,
  `C_Pin` decimal(10,0) NOT NULL,
  `C_Phone` decimal(10,0) NOT NULL,
  `C_DOB` varchar(11) NOT NULL,
  `C_Gender` varchar(100) NOT NULL,
  `C_Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`Cust_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`Cust_Id`,`Username`,`C_Fname`,`C_Lname`,`C_Address`,`C_City`,`C_Dist`,`C_Street`,`C_Pin`,`C_Phone`,`C_DOB`,`C_Gender`,`C_Status`) values 
(1,'snehaseb@gmail.com','Sneha','Sebastian','Thottumkal','Pala','Kottayam','Pala',678686,9876567898,'2003-04-10','Female',1),
(2,'asra@gmail.com','Asra','Meherin','Cheerakattil','Perumbavoor','Ernakulam','Perumbavoor',678987,9876545678,'2002-12-03','Female',1),
(3,'anu@gmail.com','Anu','Stephen','xyz','Paravoor','Ernakulam','Paravoor',678987,9876543234,'2002-08-12','Female',1),
(4,'meera@gmail.com','Meera','Krishna','Puthenveetil','Karingachira','Ernakulam','Karingachira',678765,9876543234,'2003-07-07','Female',1),
(5,'snehasony@gmail.com','Sneha','Sony','abc','Varapuzha','Ernakulam','Varapuzha',678987,9876543234,'2003-07-03','Female',1);

/*Table structure for table `tbl_delivery` */

DROP TABLE IF EXISTS `tbl_delivery`;

CREATE TABLE `tbl_delivery` (
  `Delivery_Id` int(11) NOT NULL AUTO_INCREMENT,
  `cassign_date` varchar(100) DEFAULT NULL,
  `mastcart_id` int(11) DEFAULT NULL,
  `Courier_Id` int(11) NOT NULL,
  `expected_date` varchar(100) NOT NULL,
  PRIMARY KEY (`Delivery_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_delivery` */

insert  into `tbl_delivery`(`Delivery_Id`,`cassign_date`,`mastcart_id`,`Courier_Id`,`expected_date`) values 
(3,'2023-10-23',2,3,'2023-10-30'),
(22,'2023-10-24',6,2,'2023-10-31'),
(12,'2023-10-23',3,1,'2023-10-30'),
(20,'2023-10-24',1,3,'2023-10-31'),
(18,'2023-10-24',4,1,'2023-10-31'),
(23,'2023-10-24',5,1,'2023-10-31');

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `Username` varchar(100) NOT NULL,
  `Login_Password` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`Username`,`Login_Password`,`Type`,`Status`) values 
('admin@gmail.com','1234','admin','1'),
('hasna@gmail.com','1234','staff','1'),
('snehasony@gmail.com','1234','customer','1'),
('meera@gmail.com','1234','customer','1'),
('anu@gmail.com','1234','customer','1'),
('asra@gmail.com','1234','customer','1'),
('snehaseb@gmail.com','6369','customer','1'),
('hanna@gmail.com','1234','staff','1'),
('dtdc@gmail.com','1234','courier','1'),
('bluedart@gmail.com','1234','courier','1'),
('fedex@gmail.com','1234','courier','1');

/*Table structure for table `tbl_mastcart` */

DROP TABLE IF EXISTS `tbl_mastcart`;

CREATE TABLE `tbl_mastcart` (
  `mastcart_id` int(5) NOT NULL AUTO_INCREMENT,
  `Cust_Id` int(5) NOT NULL,
  `tot_amount` varchar(100) NOT NULL,
  `cart_status` varchar(100) NOT NULL,
  PRIMARY KEY (`mastcart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_mastcart` */

insert  into `tbl_mastcart`(`mastcart_id`,`Cust_Id`,`tot_amount`,`cart_status`) values 
(1,5,'440','assigned to courier'),
(2,3,'7560','Order Delivered'),
(3,2,'555','Order Delivered'),
(4,4,'4480','Order Delivered'),
(5,4,'1080','assigned to courier'),
(6,2,'555','assigned to courier');

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `mastcart_id` int(5) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `reachable` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`order_id`,`mastcart_id`,`order_date`,`reachable`) values 
(1,1,'2023-10-23','0'),
(2,2,'2023-10-23','0'),
(3,3,'2023-10-23','0'),
(4,4,'2023-10-24','0'),
(5,5,'2023-10-24','0'),
(6,6,'2023-10-24','0');

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `Payment_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Courier_id` int(11) DEFAULT NULL,
  `Card_Id` int(5) DEFAULT NULL,
  `mastcart_Id` int(5) DEFAULT NULL,
  `Payment_Date` date NOT NULL,
  PRIMARY KEY (`Payment_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

insert  into `tbl_payment`(`Payment_Id`,`Courier_id`,`Card_Id`,`mastcart_Id`,`Payment_Date`) values 
(1,3,5,1,'2023-10-23'),
(2,3,5,2,'2023-10-23'),
(3,1,2,3,'2023-10-23'),
(4,1,4,4,'2023-10-24'),
(5,1,4,5,'2023-10-24'),
(6,2,2,6,'2023-10-24');

/*Table structure for table `tbl_purchild` */

DROP TABLE IF EXISTS `tbl_purchild`;

CREATE TABLE `tbl_purchild` (
  `Pc_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Pm_Id` int(5) DEFAULT NULL,
  `Book_Id` int(5) DEFAULT NULL,
  `Purch_quantity` varchar(100) NOT NULL,
  `Cost_Price` varchar(100) NOT NULL,
  `Selling_price` varchar(100) NOT NULL,
  `cpurch_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Pc_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchild` */

insert  into `tbl_purchild`(`Pc_Id`,`Pm_Id`,`Book_Id`,`Purch_quantity`,`Cost_Price`,`Selling_price`,`cpurch_status`) values 
(1,1,1,'10','400','440','stock added'),
(2,2,3,'15','4500','4995','stock added'),
(3,3,4,'5','300','345','stock added'),
(4,4,2,'20','1000','1080','stock added'),
(5,5,3,'15','4500','4995','available'),
(6,6,3,'10','4500','4995','available'),
(7,7,3,'10','4500','4995','available'),
(8,8,3,'10','4500','4995','available'),
(9,9,4,'5','4000','4600','available'),
(10,10,4,'5','4000','4600','available'),
(11,0,3,'10','4500','4995','available'),
(12,11,7,'5','4000','4480','stock added'),
(13,12,4,'5','4000','4600','available'),
(14,13,3,'10','4500','4995','available'),
(15,14,7,'5','4000','4480','stock added');

/*Table structure for table `tbl_purmaster` */

DROP TABLE IF EXISTS `tbl_purmaster`;

CREATE TABLE `tbl_purmaster` (
  `Pm_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Staff_Id` int(5) DEFAULT NULL,
  `Vendor_Id` int(5) DEFAULT NULL,
  `Pm_Date` date NOT NULL,
  `total_amt` varchar(100) NOT NULL,
  `purch_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Pm_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purmaster` */

insert  into `tbl_purmaster`(`Pm_Id`,`Staff_Id`,`Vendor_Id`,`Pm_Date`,`total_amt`,`purch_status`) values 
(1,0,1,'2023-10-19','4000','Purchased'),
(2,0,2,'2023-10-19','5000','Purchased'),
(3,0,3,'2023-10-19','1500','Purchased'),
(4,0,2,'2023-10-20','20000','Purchased'),
(5,0,2,'2023-10-20','45000','Purchased'),
(6,0,3,'2023-10-20','20000','Purchased'),
(7,0,2,'2023-10-21','22500','Purchased'),
(8,0,3,'2023-10-21','20000','Purchased'),
(9,0,3,'2023-10-21','20000','Purchased'),
(10,0,3,'2023-10-21','20000','Purchased'),
(11,0,3,'2023-10-21','20000','Purchased'),
(12,0,1,'2023-10-21','20000','Purchased'),
(13,0,3,'2023-10-21','45000','Purchased'),
(14,0,2,'2023-10-21','20000','Purchased');

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `Staff_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) DEFAULT NULL,
  `Staff_Fname` varchar(100) NOT NULL,
  `Staff_Lname` varchar(100) NOT NULL,
  `Staff_City` varchar(100) NOT NULL,
  `Staff_Dist` varchar(100) NOT NULL,
  `Staff_Pin` int(10) NOT NULL,
  `Staff_Street` varchar(100) NOT NULL,
  `Staff_Phone` varchar(100) NOT NULL,
  `Staff_Gender` varchar(100) NOT NULL,
  `Staff_DOB` varchar(100) NOT NULL,
  `Staff_Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`Staff_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_staff` */

insert  into `tbl_staff`(`Staff_Id`,`Username`,`Staff_Fname`,`Staff_Lname`,`Staff_City`,`Staff_Dist`,`Staff_Pin`,`Staff_Street`,`Staff_Phone`,`Staff_Gender`,`Staff_DOB`,`Staff_Status`) values 
(1,'hasna@gmail.com','Hasna','Abdul Nazar','Ernakulam','Vazhakkala',678987,'Vazhakkala','9876567887','Female','2003-09-30',1),
(2,'hanna@gmail.com','Hanna','Maria Benny','Puthencruz','Ernakulam',678765,'Puthencruz','9876788765','Female','2002-07-22',1);

/*Table structure for table `tbl_subcategory` */

DROP TABLE IF EXISTS `tbl_subcategory`;

CREATE TABLE `tbl_subcategory` (
  `Subcat_Id` int(5) NOT NULL AUTO_INCREMENT,
  `Cat_Id` varchar(5) DEFAULT NULL,
  `Subcat_Name` varchar(500) NOT NULL,
  `Subcat_Desc` varchar(1000) NOT NULL,
  `subcat_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Subcat_Id`),
  KEY `Subcat_Id` (`Subcat_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subcategory` */

insert  into `tbl_subcategory`(`Subcat_Id`,`Cat_Id`,`Subcat_Name`,`Subcat_Desc`,`subcat_status`) values 
(3,'1','Science Fiction','Science fiction books transport readers to imaginative realms where the boundaries of science, technology, and human potential are pushed to their limits and beyond. These captivating works of speculative fiction explore futuristic worlds, advanced technologies, and the consequences of scientific innovation on society and individuals. ','1'),
(4,'1','Romance','Romance fiction books transport readers into the realms of love and passion, weaving tales of affection, desire, and emotional connection. These stories revolve around romantic relationships, often exploring the intricate dance of human emotions, obstacles to love, and the triumph of heart over adversity. Romance fiction spans various subgenres, from historical romances set in bygone eras to contemporary love stories set in modern settings. ','1'),
(5,'1','Mystery','Mystery fiction books immerse readers in the captivating world of suspense, intrigue, and enigma. These stories revolve around the art of solving puzzles, uncovering secrets, and unraveling complex mysteries. Typically featuring detectives, amateur sleuths, or investigative protagonists, mystery fiction takes readers on a thrilling journey as they attempt to piece together clues, navigate through red herrings, and ultimately discover the truth hidden beneath layers of deception.','1'),
(6,'1','Horror','Horror fiction books beckon readers into the shadowy realms of fear, dread, and the supernatural. These spine-tingling stories evoke a visceral response by exploring the macabre, the unknown, and the eerie. Horror fiction introduces readers to nightmarish creatures, haunted locations, and malevolent forces that elicit feelings of terror and suspense.','1'),
(7,'2','Biography','Non-fiction biography books offer readers an intimate glimpse into the lives of real individuals, providing a compelling narrative of their experiences, achievements, and personal journeys. These books delve deep into the biographical details of noteworthy figures, spanning a diverse range of subjects, from historical icons and political leaders to artists, scientists, and everyday heroes.','1'),
(8,'2','Autobiography','Non-fiction autobiography books invite readers into the personal realm of an individuals life, as told by the subject themselves. These books are deeply personal narratives, offering firsthand accounts of an individuals experiences, memories, and reflections on their journey through life. ','1'),
(9,'2','Travel','Non-fiction travel books are literary passports to exploration and adventure. These captivating narratives transport readers to distant lands and exotic destinations, offering a firsthand account of the authors real-life journeys and encounters with diverse cultures, landscapes, and experiences.','1'),
(10,'2','Self-Help and Personal Development','Self-help and personal development books serve as guides and companions on the path to personal growth and empowerment. These books are invaluable resources that offer practical advice, strategies, and insights to help individuals enhance their lives, overcome challenges, and achieve their full potential.','1'),
(11,'6','Shakespeare Plays','Shakespeare plays represent the pinnacle of English literature and theatrical artistry. Penned by the renowned playwright William Shakespeare during the late 16th and early 17th centuries, these timeless works are celebrated for their intricate plots, complex characters, and poetic brilliance.','1'),
(12,'6','Poetry','Poetry in literature is the art of using language to evoke emotions, paint vivid imagery, and convey profound thoughts in a condensed and rhythmic form. It is a genre that transcends time and culture, encompassing an array of styles, from classic sonnets and epic narratives to modern free verse and spoken word.','1'),
(13,'5','Adventure Stories','Adventure stories in children and teen books are thrilling literary journeys that ignite young imaginations and take readers on exhilarating quests. These tales are filled with daring heroes, epic quests, and the promise of discovery. Whether set in fantastical realms, distant lands, or the here and now, adventure stories capture the spirit of exploration and the thrill of the unknown.','1'),
(14,'5','Comic Strip Fiction','Comic strip fiction in children and teen books presents stories through a dynamic blend of visual art and narrative, captivating young readers with colorful illustrations and engaging storytelling. These books bring beloved characters to life within a series of interconnected comic strips, creating an immersive reading experience.','1'),
(15,'5','Short Stories','Short stories in children and teen books are compact literary gems that pack a powerful punch in a condensed format. These bite-sized narratives offer young readers the joy of a complete story within a few pages, making them perfect for quick reading sessions or bedtime tales.','1'),
(16,'1','Thrillers','Thriller fiction books','1');

/*Table structure for table `tbl_vendor` */

DROP TABLE IF EXISTS `tbl_vendor`;

CREATE TABLE `tbl_vendor` (
  `Vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `Staff_id` int(100) DEFAULT NULL,
  `Vendor_name` varchar(100) NOT NULL,
  `V_Phno` decimal(10,0) NOT NULL,
  `V_Street` varchar(100) NOT NULL,
  `V_Dist` varchar(100) NOT NULL,
  `V_Pin` decimal(10,0) NOT NULL,
  `V_City` varchar(100) NOT NULL,
  `vendor_email` varchar(100) NOT NULL,
  `Vendor_Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`Vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vendor` */

insert  into `tbl_vendor`(`Vendor_id`,`Staff_id`,`Vendor_name`,`V_Phno`,`V_Street`,`V_Dist`,`V_Pin`,`V_City`,`vendor_email`,`Vendor_Status`) values 
(1,0,'Happy Books Company',9809890789,'Pala','Kottayam',687011,'Pala','happybook@gmail.com',1),
(2,0,'Books Shop Vendors',9812300909,'Pattam','Trivandrum',678900,'Pattam','booksshop@gmail.com',1),
(3,0,'Haha Book Ventures',9876543222,'Kaloor','Ernakulam',654324,'Kaloor','hahabookventures@gmail.com',1),
(4,1,'Ronald Vendors',9800989999,'Perumbavoor','Ernakulam',657811,'Perumbavoor','ronaldvendors@gmail.com',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
