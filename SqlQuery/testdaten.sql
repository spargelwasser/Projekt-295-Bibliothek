insert into type(typename) values ("Taschenbuch");
insert into type(typename) values ("Gebunden");
insert into type(typename) values ("E-Book");
insert into type(typename) values ("Hörbuch");

insert into genre(genreName) values ("Roman");
insert into genre(genreName) values ("Fantasy");
insert into genre(genreName) values ("Mystery");

insert into author(authorName, authorPrename) values ("Funke", "Cornelia");
insert into author(authorName, authorPrename) values ("Ende", "Michael");

insert into book(bookTitle, authorId, typeId, bookPages) values ("Tintenherz", 1, 2, 576);
insert into book(bookTitle, authorId, typeId, bookPages) values ("Momo", 2, 1, 88);

insert into bookGenre(bookId, genreId) values (1, 1);
insert into bookGenre(bookId, genreId) values (1, 2);
insert into bookGenre(bookId, genreId) values (1, 3);
insert into bookGenre(bookId, genreId) values (2, 1);
insert into bookGenre(bookId, genreId) values (2, 2);