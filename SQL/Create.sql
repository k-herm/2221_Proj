CREATE DATABASE prison;

CREATE TABLE rank_clearance(
	rank char(20),
    Clearance_level char(20),
	PRIMARY KEY (rank)
);

CREATE TABLE Guards(
	Employee_ID INTEGER ,
    Name char(50),
    Address char(50),
    Age INTEGER,
    Sex char(1),
    Phone_Number char(13),
	rank char(20),
	PRIMARY KEY (Employee_ID),
	FOREIGN KEY (rank) references rank_clearance(rank)
        ON UPDATE CASCADE
);


CREATE TABLE Administrator(
	Employee_ID INTEGER,
    Name char(50),
    Address char(50),
    Age INTEGER,
    Sex char(1),
    Phone_Number char(13),
	PRIMARY KEY (Employee_ID)
);

CREATE TABLE Cell(
	Cell_ID INTEGER,
	Max_Occupants INTEGER,
	Location CHAR(20),
	PRIMARY KEY (Cell_ID)
);

CREATE TABLE Inmate(
	Inmate_ID INTEGER,
	Employee_ID INTEGER NOT NULL,
    Cell_Id INTEGER NOT NULL,
	Name CHAR(20),
	Security_Level CHAR(50),
	Age INTEGER,
	Sex CHAR(1),
	Crime CHAR(50),
	Parole_Date DATE,
	PRIMARY KEY (Inmate_ID),
	FOREIGN KEY (Employee_ID) references Guards(Employee_ID)
            ON UPDATE CASCADE,
    FOREIGN KEY (cell_ID) references Cell(Cell_ID)
            ON UPDATE CASCADE
);


CREATE TABLE Therapist_Analysis (
    Session_ID INTEGER,
	Inmate_ID INTEGER NOT NULL,
	Therapist_Name char(20) NOT NULL,
	Date DATE,
	PRIMARY KEY (session_ID),
    FOREIGN KEY (Inmate_ID) references Inmate(Inmate_ID)
            ON UPDATE CASCADE
            ON DELETE CASCADE
);

CREATE TABLE Visitor (
	Visitor_ID INTEGER,
	Name char(50) NOT NULL,
	PRIMARY KEY (Visitor_ID)
);

CREATE Table Visits (
    Visitor_ID INTEGER,
    Inmate_ID INTEGER,
    Visit_ID INTEGER,
    Relationship char(20),
    PRIMARY KEY (Visitor_ID, Inmate_ID, Visit_ID),
    FOREIGN KEY (Visitor_ID) references Visitor_Logs(Visitor_ID)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
    FOREIGN KEY (Inmate_ID) references Inmate(inmate_id)
            ON DELETE CASCADE
            ON UPDATE CASCADE
);

CREATE TABLE Visitor_Logs (
	Visitor_ID INTEGER,
	Employee_ID INTEGER,
	Visit_ID INTEGER,
	Date DATE,
    Time_in TIME NOT NULL,
    Time_out TIME NOT NULL,
	PRIMARY KEY (Visitor_ID, Visit_ID, Date),
    FOREIGN KEY (Employee_ID) references Administrator(Employee_ID)
            ON UPDATE CASCADE,
    FOREIGN KEY (Visitor_ID) references Visitor(Visitor_ID)
);


CREATE TABLE Delivery_Company (
	Company_ID INTEGER,
	Name char(50) NOT NULL,
	Contents char(50),
    Frequency char(50),
    Representative char(20),
	PRIMARY KEY (Company_ID)
);

CREATE TABLE Delivery_Monitors (
	Company_ID INTEGER,
    Employee_ID INTEGER,
    Date DATE,
	Deliver_person_name char(50),
	Time_in TIME NOT NULL,
    Time_out TIME NOT NULL,
	PRIMARY KEY (Company_ID, Employee_ID, Date),
    FOREIGN KEY (Employee_ID) references Administrator(Employee_ID)
            ON UPDATE CASCADE,
    FOREIGN KEY (Company_ID) references Delivery_Company(Company_ID)
            ON UPDATE CASCADE
);

CREATE TABLE Distributor_of (
	Supplier_company_ID INTEGER,
    Distributor_company_ID INTEGER,
    PRIMARY KEY (Supplier_company_ID, Distributor_company_ID),
    FOREIGN KEY (Supplier_company_ID) REFERENCES Delivery_Company(Company_ID)
            ON UPDATE CASCADE,
    FOREIGN KEY (Distributor_company_ID) REFERENCES Delivery_Company(Company_ID)
            ON UPDATE CASCADE
);

CREATE TABLE Admin_Login(
    Login_Pass CHAR(5) PRIMARY KEY,
    Username CHAR(30),
    Employee_ID INTEGER,
    FOREIGN KEY (Employee_ID) REFERENCES administrator(Employee_ID)
    );

CREATE TABLE Guard_Login(
    Login_Pass CHAR(5) PRIMARY KEY,
    Username CHAR(30),
    Employee_ID INTEGER,
    FOREIGN KEY (Employee_ID) REFERENCES guards(Employee_ID)
    );


INSERT INTO rank_clearance (rank, clearance_level)
VALUES('Officer', 'Minimum'),
('Sergeant', 'Low'),
('Lieutenant', 'Medium'),
('Captain', 'High'),
('Warden', 'Unclassified');

INSERT INTO guards(Employee_ID, Name, Address, Age, Sex, Phone_number, Rank)
VALUES(637, 'Brianna Kieron', '5549 Thornton Street', 32, 'F', '232 525-6578', 'Sergeant'),
(4686, 'Judd Tommy', '1001 Arkansas Lane', 48, 'M', '232 677-1892', 'Warden' ),
(5283, 'Elijah Evaline', '104 Washington Street', 27, 'M', '232 646-3324', 'Officer'),
(7167, 'Matt Lopez', '632 Yellow Drive', 22, 'M', '232 646-9522', 'Officer'),
(7009, 'John Hendricks', '88 Chestnut Street', 36, 'M', '232 986-7431', 'Captain'),
(8053, 'Kiley Cybill', '9931 Royce Drive', 29, 'F', '232 357-9658', 'Lieutenant'),
(8057, 'Kiarash Kianpoor', '1010 Fall st.', 32, 'M', '232 467-7788', 'Lieutenant');

INSERT INTO Cell (Cell_id, max_occupants, location)
VALUES(3146, 2, 'A-Block'),
(2628, 2, 'A-Block'),
(2137, 2, 'B-Block'),
(2567, 2, 'B-Block'),
(2548, 2, 'B-Block'),
(5551, 1, 'C-Block'),
(5931, 1, 'C-Block'),
(5822, 1, 'C-Block'),
(7050, 1, 'Iso-Block');

INSERT INTO Inmate (Inmate_ID, employee_id, cell_Id, name, security_level, age, sex, crime, parole_date)
VALUES(01911, 5283, 3146, 'Avalon Piers', 'Minimum', 22, 'M', 'Vandalism', '2018-12-02'),
(1400, 637, 2628, 'Salome Clyde', 'Low', 29, 'F', 'Breaking and Entering', '2019-06-06'),
(1500, 637, 2628, 'Jennifer Damon', 'Low', 25, 'F', 'Shop Lifting', '2019-05-27'),
(8603, 8053, 2137, 'Hope Bobby', 'Medium', 58, 'F', 'Possession with Intent to sell', '2019-11-05'),
(8624, 8057, 2567, 'Edwin Snowman', 'Medium', 25, 'M', 'Stealing Bank Information Online', '2020-01-11'),
(6945, 7009, 5551, 'Roselyn Ned', 'High', 36, 'F', 'Assault with a Deadly Weapon', '2021-03-21'),
(6951, 7167, 2548, 'Nad Farhadi', 'Minimum', 46, 'M', 'Tax Fraud', '2019-06-15'),
(6273, 7167, 2548, 'Stephan Gates', 'Minimum', 44, 'M', 'Tax Fraud', '2019-04-11'),
(151, 4686, 7050, 'Terence Abraham', 'Unclassified', 52, 'M', '1st Degree Murder', '2033-04-18'),
(4798, 8053, 2137, 'Jennifer Millstein', 'Medium', 56, 'F', 'Possession with Intent to sell', '2019-11-06') ;

INSERT INTO administrator(employee_id, name, address, age, sex, phone_number)
VALUES(4677, 'Darrel Vera', '221 Burnaby Steet', 38, 'M', '232 567-3218'),
(9944, 'Wesley Landford', '2118 Davies Street', 32, 'M', '232 795-9077'),
(7027, 'Marni Cuthbert', '5656 Darnell Avenue', 55, 'F', '232 668-5395'),
(3030, 'Robbie Truman', '32156 Loraine Crescent', 42, 'M', '232 538-9036'),
(9318, 'Hugh Lester', '5199 Lorn Avenue', 36, 'M', '232 135-7258');

INSERT INTO Therapist_Analysis(session_id, inmate_id, therapist_name, date)
VALUES(145700, 151, 'Rosanne Vin', '2018-10-22'),
(455650, 151, 'Rosanne Vin', '2018-10-15'),
(337240, 151, 'Rosanna Vin', '2018-10-08'),
(679080, 6945, 'Lisa Porter', '2018-10-19'),
(237900, 6945, 'Lisa Porter', '2018-09-21');

INSERT INTO Visitor(visitor_id, name)
VALUES (55748, 'Willard Piers'),
(224131, 'Blake Tye'),
(626061, 'Kaylie Camille'),
(641821, 'Sharla Krystal'),
(347895, 'Geneva Winter'),
(257742, 'Saul Goodman');

INSERT INTO Visits(Visitor_ID, Inmate_ID, Visit_ID, Relationship)
VALUES(55748, 1911, 1, 'Father'),
(224131, 1400, 2, 'Significant Other'),
(626061, 8603, 3, 'Niece'),
(641821, 8624, 4, 'Acquaintance'),
(347895, 151, 5, 'Lawyer'),
(347895, 151, 6, 'Lawyer'),
(257742, 151, 7, 'Lawyer'),
(257742, 01911, 8, 'Lawyer'),
(257742, 1400, 9, 'Lawyer'),
(257742, 1500, 10, 'Lawyer'),
(257742, 8603, 11, 'Lawyer'),
(257742, 8624, 12, 'Lawyer'),
(257742, 6945, 13, 'Lawyer'),
(257742, 6951, 14, 'Lawyer'),
(257742, 6273, 15, 'Lawyer'),
(257742, 4798, 16, 'Lawyer');


INSERT INTO visitor_logs(Visitor_ID, Employee_ID, Visit_ID, Date, Time_In, Time_Out)
VALUES(55748, 9944, 1, '2018-10-21', '16:15:21', '16:50:43'),
(224131, 4677, 2, '2018-09-20', '13:54:14', '14:50:02'),
(626061, 7027, 3, '2018-10-19', '14:35:55', '14:58:32'),
(641821, 3030, 4, '2018-10-15', '15:23:25', '16:05:12'),
(347895, 3030, 5, '2018-09-28', '13:42:51', '14:43:44'),
(347895, 3030, 6, '2018-09-20', '14:52:57', '15:53:13'),
(257742, 7027, 7, '2018-10-19', '14:30:15', '15:35:22'),
(257742, 7027, 8, '2018-10-15', '14:33:25', '15:30:12'),
(257742, 7027, 9, '2018-09-27', '14:20:10', '15:26:31'),
(257742, 9944, 10, '2018-09-24', '14:40:11', '15:38:55'),
(257742, 3030, 11, '2018-09-22', '14:45:23', '15:58:12'),
(257742, 4677, 12, '2018-09-17', '14:31:22', '15:54:25'),
(257742, 9944, 13, '2018-09-15', '14:30:30', '15:36:55'),
(257742, 4677, 14, '2018-09-14', '14:26:23', '15:35:23'),
(257742, 4677, 15, '2018-09-30', '14:27:33', '15:43:52'),
(257742, 9944, 16, '2018-09-29', '14:33:15', '15:33:35');

INSERT INTO Delivery_company(company_id, name, contents, frequency, representative)
VALUES(559615, 'Urban Clean: Janitorial Supplies', 'Toilet Paper, Hand Towels, Hand Soap, Bleach', 'Bi-Weekly', 'David Rose'),
(662101, 'Smart City Produce', 'Onion, Celery, Potatoes, Tomatoes', 'Weekly', 'Jason Gela'),
(484773, 'Farm Town Meats', 'Beef, Chicken, Pork, Cod', 'Weekly', 'Jason Gela'),
(146215, 'White Sheet Laundromat', 'Towels, Bedspread, Uniforms', 'Bi-weekly', 'Henrik Ramirus'),
(732672, 'Amico Chef, Italian Cuisine', 'A la carte meals', 'On Demand', 'Andrea Ricci');

INSERT INTO Distributor_of(supplier_company_id, distributor_company_id)
VALUES(484773, 732672),
(662101, 732672),
(559615, 732672),
(146215, 732672),
(559615, 146215);

INSERT INTO delivery_monitors(Company_ID, Employee_ID, Date, Deliver_person_name, Time_In, Time_Out)
VALUES(559615, 4677, '2018-10-22', 'Melanie Niall', '08:15:00', '08:45:00'),
(662101, 9944, '2018-10-20', 'Andi Payton', '06:15:32', '06:45:59'),
(484773,9944, '2018-10-20', 'Zack Lorita', '06:16:48', '06:47:27'),
(146215, 3030, '2018-10-17', 'July Kevan', '06:02:12', '07:01:23'),
(732672, 9318, '2018-10-01', 'Roselyn Carmelo', '17:21:39', '18:08:46');

INSERT INTO guard_login(login_pass, username, Employee_ID)
VALUES(25564, 'b.kieran', 637),
(62745, 'j.tommy', 4686),
(28326, 'e.evaline', 5283),
(61132, 'j.hendricks', 7009),
(11485, 'm.lopez', 7167),
(20603, 'k.cybil', 8053),
(67568, 'k.kianpoor', 8057);

INSERT INTO admin_login(login_pass, username, Employee_ID)
VALUES(99181, 'r.truman', 3030),
(26356, 'd.vera', 4677),
(53573, 'm.cuthbert', 7027),
(56762, 'h.lester', 9318),
(55161, 'w.landford', 9944);







