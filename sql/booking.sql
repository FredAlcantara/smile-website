CREATE TABLE booking(
    booking_id int(11) AUTO_INCREMENT PRIMARY KEY,
    reference char(30) not null,
    type char(30) not null,
    theme char(30) not null,
    day char(15) not null,
    time char(15) not null 
    );