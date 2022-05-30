create table `accounts`(
username varchar(20) not null primary key,
password varchar(255) not null,
email varchar(100) not null,
firstName varchar(30) not null,
lastName varchar(30) not null
);

create table `houses` (
id int(11) not null PRIMARY KEY auto_increment,
location varchar(50) not null,
capacity int(11) not null,
price int(11) not null,
photo varchar(100) not null,
hostedBy varchar(20),
FOREIGN KEY hostedBy REFERENCES accounts(username)
);

create table `reservations`(
reservation_id int(11) not null primary key auto_increment,
account_username varchar(20),
house_id int(11),
nights int(11),
checkin date,
checkout date,
totalPrice int(11),
FOREIGN KEY account_username REFERENCES accounts(username),
FOREIGN KEY house_id REFERENCES houses(id)
);dbin