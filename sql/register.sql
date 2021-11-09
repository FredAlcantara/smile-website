/*create tables for register system*/
create table registration(
username char (15) primary key,
fname char (30) not null,
sname char (30) not null,
phone_no char(11) unique,
email char (30) unique,
pword char (255) not null
);