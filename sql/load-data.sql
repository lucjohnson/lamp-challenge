load data infile '/var/www//html/challenges-lucjohnson/lamp-challenge/data/movies-2014.csv'
into table movies
fields terminated by ','
optionally enclosed by '"'
ignore 1 lines
(title,released,distributor,genre,rating,gross,tickets,imdb_id)
set movie_id=null;