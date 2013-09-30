CREATE TABLE `es_users` (
  `userid` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE `es_brand` (
  `brandid` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `creationdate` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `lastupddttm` datetime DEFAULT NULL,
  `lastupduser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`brandid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;


CREATE TABLE `es_product` (
  `prodid` bigint(20) NOT NULL AUTO_INCREMENT,
  `brandid` bigint(20) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `prodcode` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `displayprice` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `instock` char(1) DEFAULT NULL,
  `imgurl` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `latupddttm` datetime DEFAULT NULL,
  `lastupduser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`prodid`),
  UNIQUE KEY `prodid_UNIQUE` (`prodid`),
  KEY `brandfk_idx` (`brandid`),
  CONSTRAINT `brandfk` FOREIGN KEY (`brandid`) REFERENCES `es_brand` (`brandid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

CREATE TABLE `es_prod_attr` (
  `prodid` bigint(20) NOT NULL,
  `attrid` bigint(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `display` varchar(3) DEFAULT NULL,
  `displayorder` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`attrid`,`prodid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `es_order` (
  `orderid` bigint(20) NOT NULL AUTO_INCREMENT,
  `orderdate` date NOT NULL,
  `orderrefcode` varchar(45) NOT NULL,
  `o_status` varchar(20) NOT NULL,
  `cusname` varchar(80) DEFAULT NULL,
  `cusphone` varchar(45) DEFAULT NULL,
  `cusemail` varchar(45) DEFAULT NULL,
  `cusnotes` varchar(255) DEFAULT NULL,
  `closeddate` date DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `expdeldate` date DEFAULT NULL,
  `lastupddttm` datetime DEFAULT NULL,
  `lastupduser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`orderid`),
  UNIQUE KEY `orderid_UNIQUE` (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

CREATE TABLE `es_order_line` (
  `orderid` bigint(20) NOT NULL,
  `linenum` bigint(20) NOT NULL,
  `prodid` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderid`,`linenum`),
  CONSTRAINT `orderfk` FOREIGN KEY (`orderid`) REFERENCES `es_order` (`orderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from es_dev.es_brand











