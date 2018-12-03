drop table utilisateurs;
drop table favoris;

create table utilisateurs (
  id integer primary key,
  login varchar(255) not null,
  mot_de_passe varchar(255) not null,
  nom varchar(255),
  prenom varchar(255),
  sexe varchar(255),
  adresse_electronique varchar(255),
  date_naissance date,
  adresse varchar(255),
  code_postal integer(5),
  ville varchar(255),
  numero_telephone integer(10),
  constraint chk_sexe check (sexe='homme' or sexe='femme')
);

create table favoris (
  id integer,
  recette integer,
  constraint pk_favoris primary key (id, recette),
  constraint fk_utilisateurs foreign key (id) references utilisateurs(id)
);
