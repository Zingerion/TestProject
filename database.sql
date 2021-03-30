create schema if not exists fakebook_db collate utf8_general_ci;
use fakebook_db;
create table if not exists users (
  id int(10) auto_increment primary key,
  nickname varchar(50) not null,
  email varchar(50) not null,
  city varchar(50) not null,
  birthdate datetime not null,
  sex enum ('m', 'w') default 'm' not null,
  password varchar(50) not null
) engine = InnoDB;
create table if not exists posts (
  id int(10) auto_increment primary key,
  userId int(10),
  title varchar(50) not null,
  caption varchar(100) not null,
  foreign key (userId) references users (id)
) engine = InnoDB;
create table if not exists images (
  id int(10) auto_increment primary key,
  postId int(10) not null,
  imageUrl int(10) not null,
  foreign key (postId) references posts (id)
) engine = InnoDB;
create table if not exists likes (
  id int(10) auto_increment primary key,
  postId int not null,
  userId int not null,
  foreign key (postId) references posts (id),
  foreign key (userId) references users (id)
) engine = InnoDB;
create table if not exists comments (
  id int(10) auto_increment primary key,
  postId int not null,
  userId int not null,
  comment varchar(100) not null,
  foreign key (postId) references posts (id),
  foreign key (userId) references users (id)
) engine = InnoDB;
create table if not exists messages (
  id int(10) auto_increment primary key,
  senderId int not null,
  receiverId int not null,
  message varchar(100) not null
) engine = InnoDB;