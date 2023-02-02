create table if not exists users
(
    id       serial
        primary key,
    name     varchar(100)      not null,
    surname  varchar(100),
    email    varchar(255)      not null,
    password varchar(255)      not null,
    role     integer default 0 not null,
    sex      varchar,
    image    varchar default 'defaultUser.jpg'::character varying
);

comment on column users.role is '0 - normal user 1 - admin';

alter table users
    owner to postgres;

create table if not exists movies
(
    id          serial
        unique,
    title       varchar,
    description varchar,
    likes       integer,
    dislikes    integer,
    created_at  date default now(),
    relase_date date,
    image       varchar
);

alter table movies
    owner to postgres;

create table if not exists movies_users
(
    id_user  integer not null
        constraint user_movies_users___fk
            references users
            on update cascade on delete cascade,
    id_movie integer not null
        constraint movies_movies_users___fk
            references movies (id)
            on update cascade on delete cascade
);

alter table movies_users
    owner to postgres;

insert into public.movies_users (id_user, id_movie)
values  (8, 3);

insert into public.users (id, name, surname, email, password, role, sex, image)
values  (8, 'name', 'surname', 'dominik@email.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'Undefined', 'defaultUser.jpg'),
        (9, 'Anna', 'Kowalska', 'anna@test.pl', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 'Woman', 'annaAvatar.jpg'),
        (10, 'name', 'surname', 'admin@admin.pl', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'Undefined', 'defaultUser.jpg');

insert into public.movies (id, title, description, likes, dislikes, created_at, relase_date, image)
values  (5, 'W trójkącie', 'Po zatonięciu luksusowego jachtu młoda para walczy z pozostałymi pasażerami o przetrwanie na bezludnej wyspie.', 86, 12, '2023-01-20', '2022-05-21', 'w trojkacie.jpg'),
        (2, 'Wszystko wszędzie naraz', 'Borykająca się z trudami codzienności kobieta w średnim wieku zostaje wciągnięta w szaloną przygodę, w której sama może uratować świat, eksplorując inne wszechświaty.', 304, 43, '2023-01-31', '2022-03-11', 'wszystko wszedzie naraz.jpg'),
        (4, 'Babilon', 'Opowieść o wielkich ambicjach, śledzi narodziny i upadek wielu gwiazd w erze niepohamowanej dekadencji i deprawacji we wczesnym Hollywood.', 603, 54, '2023-01-19', '2022-12-22', 'babilon.jpg'),
        (1, 'Menu', 'Młoda para wybiera się na odległą wyspę, do ekskluzywnej restauracji. Okazuje się jednak, że nie wszystko jest takie jakim się wydaje a w menu czekają zaskakujące niespodzianki.', 53, 2, '2023-01-31', '2022-09-13', 'menu.jpg'),
        (7, 'Czarna panter: Wakanda w moim sercu', 'Po śmierci króla T''Challi królowa Ramonda, Shuri, M''Baku, Okoye i Dora Milaje stają w obronie swojego ludu przed interwencją światowych mocarstw. Otwierając nowy rozdział swojej historii, mieszkańcy Wakandy łączą siły z War Dog Nakią i Everettem Rossem, by wytyczyć nowy kierunek dla swojego królestwa.', 0, 0, '2023-02-02', '2022-11-09', 'wakanda forever.jpg'),
        (0, 'Troll', 'Gdy eksplozja w norweskich górach budzi wiekowego trolla, władze wysyłają nieustraszoną paleontolożkę, która ma powstrzymać siejącą zniszczenie istotę.', 4, 0, '2023-02-02', '2022-12-01', 'troll.jpg'),
        (3, 'Avatar: Istota wody', 'Pandorę znów napada wroga korporacja w poszukiwaniu cennych minerałów. Jack i Neytiri wraz z rodziną zmuszeni są opuścić wioskę i szukać pomocy u innych plemion zamieszkujących planetę.', 1055, 89, '2023-01-12', '2022-12-14', 'Avatar istota wody.jpg');