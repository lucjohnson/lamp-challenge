drop table if exists movies;

create table movies (
    movie_id int NOT NULL AUTO_INCREMENT,
    title varchar(255),
    released date,
    distributor varchar(255),
    genre varchar(255),
    rating varchar(15),
    gross int,
    tickets int,
    imdb_id varchar(255),
    PRIMARY KEY (movie_id)     
);