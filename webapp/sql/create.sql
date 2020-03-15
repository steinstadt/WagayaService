create table category (
  id int primary key auto_increment,
  name varchar(250),
  attr varchar(250)
);

create table post (
  id int primary key auto_increment,
  sent varchar(250),
  category int,
  favorite int default 0,
  surprise int default 0,
  client_time timestamp default current_timestamp,
  foreign key (category) references category(id)
);
