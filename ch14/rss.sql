--
-- Example rss.sql
-- Database structure needed for local caching
--
create table tRSSFeed (
    Xid            int                default unique,
    Title          varchar(500)       ,
    Link           varchar(200)       ,
    Url            varchar(200)       not null,
    Frequency      int                not null,
    LastUpdate     int                ,
    Description    varchar(32768),
    primary key (xid)
);

create table tRSSItem (
    Xid            int                default unique,
    RSSXid         int                not null,
    Title          varchar(500)       ,
    Link           varchar(200)       ,
    ItemDate       int                ,
    Description    varchar(32768)     ,
    primary key (xid)
);

insert into tRSSfeed (Url, Frequency) values ('http://php.net/news.rss', 7200);
insert into tRSSfeed (Url, Frequency) values ('http://slashdot.org/slashdot.rss', 3600);