DROP TABLE IF EXISTS `hatesttbl`;
CREATE TABLE hatesttbl (
  ID BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  TestName VARCHAR(150) NULL,
  Orders VARCHAR(150) NULL,
  OrderDate VARCHAR(150) NULL,
  Results VARCHAR(150) NULL,
	ResultDate VARCHAR(150) NULL,
  Reports VARCHAR(150) NULL,
  ReportDate VARCHAR(150) NULL,
	PRIMARY KEY (`ID`)
);

INSERT INTO `hatesttbl` 
(`TestName`, `Orders`, `OrderDate`, `Results`, `ResultDate`, `Reports`, `ReportDate`) VALUES
('Red Blood Test1', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test2', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test3', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test4', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test5', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test6', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test7', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test8', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test9', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test10', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL),
('Red Blood Test11', 'Yes', '10/30/2011', 'Yes', '11/23/2011', 'No', NULL);