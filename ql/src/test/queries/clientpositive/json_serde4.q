drop table if exists json_serde4_1;
drop table if exists json_serde4_2;

create table json_serde4_1 (tiny_value TINYINT, small_value SMALLINT, int_value INT, big_value BIGINT)
  row format serde 'org.apache.hadoop.hive.serde2.JsonSerDe';

insert into table json_serde4_1 values (128, 32768, 2147483648, 9223372036854775808);
insert into table json_serde4_1
    select 128, 32768, 2147483648, 9223372036854775808;

LOAD DATA LOCAL INPATH '../../data/files/sampleJson.json' INTO TABLE json_serde4_1;

select * from json_serde4_1;

create table json_serde4_2 (tiny_value TINYINT, small_value SMALLINT, int_value INT, big_value BIGINT)
  row format serde 'org.apache.hive.hcatalog.data.JsonSerDe';

insert into table json_serde4_2 values (128, 32768, 2147483648, 9223372036854775808);
insert into table json_serde4_2
    select 128, 32768, 2147483648, 9223372036854775808;

LOAD DATA LOCAL INPATH '../../data/files/sampleJson.json' INTO TABLE json_serde4_2;

select * from json_serde4_2;

drop table json_serde4_1;
drop table json_serde4_2;