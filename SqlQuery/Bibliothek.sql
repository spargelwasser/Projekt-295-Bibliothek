drop database if exists bibliothek;
create database bibliothek;
use bibliothek;

create table type(
    typeKey int not null auto_increment,
    typeName varchar(100) not null,
    primary key (typeKey)
);

create table genre(
    genreKey int not null auto_increment,
    genreName varchar(50) not null,
    primary key (genreKey)
);

create table author(
    authorKey int not null auto_increment,
    authorName varchar(100) not null,
    authorPrename varchar(100),
    primary key (authorKey)
);

create table book(
    bookKey int not null auto_increment,
    bookTitle varchar(100) not null,
    authorId int not null,
    typeId int not null,
    bookPages int,
    foreign key (authorId) references author(authorKey) on delete cascade on update cascade,
    foreign key (typeId) references type(typeKey) on delete cascade on update cascade,
    primary key (bookKey)
);

create table bookGenre(
    bookGenreKey int not null auto_increment,
    bookId int not null,
    genreId int not null,
    foreign key (bookId) references book(bookKey) on delete cascade on update cascade,
    foreign key (genreId) references genre(genreKey) on delete cascade on update cascade,
    primary key (bookGenreKey)
);