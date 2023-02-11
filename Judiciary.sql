CREATE DATABASE courtsystem;
USE courtsystem;


CREATE TABLE PositionTbl(
      PosItId VARCHAR(10) NOT NULL PRIMARY KEY,
      PosIt VARCHAR(120) NOT NULL
);

/*INSERTING TABLE VALUES*/
/*Different Judge Hierarchies*/
INSERT INTO PositionTbl(PosItId,PosIt) VALUES ("001J","Chief Justice"),("002J","Judge"),("003J","Magistrate"),
("SR001","Senior Advocate"),("JR002","Junior Advocate");


CREATE TABLE DepartmentTbl(
	  DeptId VARCHAR(10)  NOT NULL PRIMARY KEY,
      DeptName VARCHAR(120) NOT NULL
);

/*Different Departments Available*/      
INSERT INTO DepartmentTbl(DeptId,DeptName) VALUES ("DEPTL","Land"),("DEPTK","Kadhis"),("DEPTCH","Children"),
("DEPTF","Family"),("DEPTMIL","Military");

CREATE TABLE JudgeTbl(
      JudgeId VARCHAR(15) NOT NULL,
      PosItId VARCHAR(5) NOT NULL,
      JudgeName VARCHAR(120) NOT NULL,
      DeptId VARCHAR(10) NOT NULL,
      AppraisalPerf DOUBLE NOT NULL,
      JudgeRoomKey VARCHAR(100) NOT NULL, /*Password Attribute*/
      JudgeEmail VARCHAR(50) NOT NULL,
      Gender CHAR(1) NOT NULL,
      PRIMARY KEY (JudgeId),
      FOREIGN KEY (PosItId) REFERENCES PositionTbl(PosItId)
);



/*Insert Judge Details Details*/
INSERT INTO JudgeTbl(JudgeId, PosItId, JudgeName, DeptId, AppraisalPerf,JudgeRoomKey,JudgeEmail,Gender) VALUES 
("JU-091-19","003J","Martin Oloo Henry","DEPTL",0.00,"44APs#10aS","martinhen@jscke.ac.ke.com","M"),
("JU-051-07","002J","Nancy Chepkorir","DEPTK",0.00,"10$%009357","nancychep@jscke.ac.ke","F"),
("JU-078-12","002J","Gen. Dr. Hellen Miriam Nafula","DEPTMIL",0.00,"BpL13HHK4","nafulamir@jscke.ac.ke","F"),
("JU-101-12","001J","Dr. Robin Nelson Okumu","DEPTL",0.00,"1090ioKABT","nelsonok@jscke.ac.ke","M"),
("JU-091-12","003J","Martin Oloo Henry","DEPTL",0.00,"34588OPisX","martin@jscke.ac.ke","M"),
("JU-1102-12","001J","Dr. Mwangi Ronald","DEPTCH",0.00,"34588OPisX","mwangiron@jscke.ac.ke","M");

/*Show inserted data*/
/*SELECT * FROM JudgeTbl;*/

CREATE TABLE LawyerTbl(
      LawyerId VARCHAR(15) NOT NULL,
      PosItId VARCHAR(5) NOT NULL,
      DeptId VARCHAR(10) NOT NULL,
      LawyerName VARCHAR(120) NOT NULL,
      AppraisalPerf DOUBLE NOT NULL,
      LawyerRoomKey VARCHAR(100) NOT NULL,
      LawyerEmail VARCHAR(50) NOT NULL,
      Gender CHAR(1) NOT NULL,
      PRIMARY KEY(LawyerId),
      FOREIGN KEY (DeptId) REFERENCES DepartmentTbl(DeptId),
      FOREIGN KEY (PosItId) REFERENCES PositionTbl(PosItId)
);
/*Insert Lawyer Details Details*/
INSERT INTO LawyerTbl(LawyerId, PosItId, DeptId, LawyerName, AppraisalPerf, LawyerRoomKey, LawyerEmail, Gender) VALUES 
("ADV-091-19","SR001","DEPTL","Oloo Henry Nyikal",0.00,"44APs#10","oloo@jscke.ac.ke.com","M"),
("ADV-051-07","SR001","DEPTCH","Dr. Emilly Korir Kiptoo",0.00,"10$%009388","moses@jscke.ac.ke","F"),
("ADV-078-12","JR002","DEPTF","Jeremy Oswald Wachira",0.00,"BpL13AAAA","jeremy@jscke.ac.ke","M"),
("ADV-101-12","JR002","DEPTL","Otieno Marcus Odii",0.00,"1090ioKSWE","odiimarcus@jscke.ac.ke","M"),
("ADV-091-12","SR001","DEPTK","Hassan Suleiman Mohammed",0.00,"345LOPPisX","suleimanh@jscke.ac.ke","M"),
("ADV-1102-12","JR002","DEPTCH","Prof. Fridman Abishek Varma",0.00,"AFRTi88OPisX","abishekvarm@jscke.ac.ke","M");

/*SEE ALL INSERTED VALUES*/
/*SELECT * FROM LawyerTbl;*/
CREATE TABLE PlaintiffTbl(
      PlaintId VARCHAR(15) NOT NULL PRIMARY KEY,
      PlaintName VARCHAR(120) NOT NULL,
      Gender CHAR(1) NOT NULL
      );
/*INSERT PLAINTIFS*/
INSERT INTO PlaintiffTbl(PlaintId,PlaintName,Gender) VALUES 
("PL001","Agnes Miller","F"),
("PL002","Jackson Imani","M"),
("PL003","Antony Matendo","M"),
("PL004","Grace Anne Moraa","F"),
("PL005","Timothy Fred","M"),
("PL006","Wilson Omondi","M");

CREATE TABLE RespondentTbl(
      ResId VARCHAR(15) NOT NULL PRIMARY KEY,
      ResName VARCHAR(120) NOT NULL,
      Gender CHAR(1) NOT NULL
);
/*INSERT RESPONDENT*/
INSERT INTO RespondentTbl(ResId,ResName,Gender) VALUES 
("RES001","Paul Nickson","M"),
("RES002","Ambrose Charles Githu","M"),
("RES003","Mwaniki Mwikali","F"),
("RES004","Tommy Odhiambo","M"),
("RES005","Faith Jepchumba","F"),
("RES006","Barry Antony","M");


CREATE TABLE CaseTbl(
      CaseId VARCHAR(15) NOT NULL,
      DeptId VARCHAR(10) NOT NULL,
      PlaintId VARCHAR(15) NOT NULL,
      ResId VARCHAR(15) NOT NULL,
      JudgeId VARCHAR(15) NOT NULL,
      LawyerId VARCHAR(15) NOT NULL,
      CaseName VARCHAR(255) NOT NULL,
      CaseDesc VARCHAR(255) NOT NULL,
      Start_date VARCHAR(50) NOT NULL,
      End_date VARCHAR(50),
      No_of_hearings INTEGER,
      No_of_complete_hearings INTEGER,
      PRIMARY KEY (CaseId),
      FOREIGN KEY (DeptId) REFERENCES DepartmentTbl(DeptId),
      FOREIGN KEY (PlaintId) REFERENCES PlaintiffTbl(PlaintId),
      FOREIGN KEY (ResId) REFERENCES RespondentTbl(ResId),
      FOREIGN KEY (JudgeId) REFERENCES JudgeTbl(JudgeId),
      FOREIGN KEY (LawyerId) REFERENCES LawyerTbl(LawyerId)
      );
      
INSERT INTO CaseTbl(CaseId, DeptId, PlaintId, ResId, JudgeId, LawyerId, CaseName, CaseDesc,
 Start_date, End_date, No_of_hearings, No_of_complete_hearings) VALUES
 ("CAS440L/23","DEPTL","PL003","RES001","JU-091-19","ADV-091-19","Magadi Land Pollution","Mr. Matendo protests againsts the acts of 
 Magadi Mining company as irresponsible where land is heavily polluted and left without strategies for reclamation.",
 "23/01/2022","",2,10),
 ("CAS440L/21","DEPTL","PL001","RES002","JU-101-12","ADV-101-12","Humphrey Wine & Dine Demolition","Agnes Miller defends her restaurant
from demolition by alleged unfair claims from Mr. Githu Charles","12/11/2022","",4,6),
 ("CAS123C/22","DEPTCH","PL004","RES004","JU-1102-12","ADV-1102-12","Custody: Miss Anne versus Mr. Antony","
 Grace Ann pushes for custody over one Bernard Samson, 4 years old, after divorce against Barry Antony","4/02/2023","",1,3);

/*SELECT * FROM CaseTbl;*/







