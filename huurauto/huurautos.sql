create database huurautos;
use huurautos;
 
create table gebruikers(
gebruikers_id int auto_increment,
naam varchar (255) ,
email varchar (255),
wachtwoord varchar (255)  ,
primary key(gebruikers_id)
);
 
ALTER TABLE gebruikers
MODIFY COLUMN role ENUM('admin', 'user', 'medewerker');
select * from gebruikers;
 
update gebruikers set role = "medewerker" where gebruikers_id = 39;
create table beheerder(
beheerder_id int auto_increment,
naam varchar (255) ,
email varchar (255),
wachtwoord varchar (255)  ,
primary key(beheerder_id)
);
 
create table autos(
auto_id int auto_increment,
foto varchar (255),
kenteken varchar (255),
autonaam varchar (255) ,
bouwjaar date,
huurprijs int,
primary key(auto_id)
);   
ALTER TABLE autos
ADD COLUMN beschrijving varchar (255);
select * from autos;
create table reseveringen(
    resevering_id int auto_increment,
    gebruikers_id int, 
    begindatum date,
    stopdatum date,
    volleprijs int,
    auto_id int,
    FOREIGN KEY (gebruikers_id) REFERENCES gebruikers(gebruikers_id),
    FOREIGN KEY (auto_id) REFERENCES autos(auto_id),
    primary key (resevering_id)
);
 
select * from reseveringen;
INSERT INTO gebruikers (gebruikers_id, naam, email, wachtwoord, role)
VALUES ( 2,'osman', 'osman123@gmail.com', 'open', 'medewerker');
 
 
select * from gebruikers;
select * from beheerder;