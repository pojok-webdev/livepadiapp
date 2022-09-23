select a.id,a.name,a.ipaddr,b.name from aps a left outer join btstowers b on b.id=a.btstower_id where a.active="1" and b.active="1" and b.id is not null;

select a.id,a.name,a.location,count(b.id)jmlap from btstowers a left outer join aps b on b.btstower_id=a.id  where a.active="1" and b.active="1" group by a.id,a.name,a.location;

select a.id,a.name,b.name from ptps a left outer join btstowers  b on b.id=a.btstower_id where b.active="1" ;


select a.id,a.name,a.location,count(c.id)jmlptp from btstowers a left outer join ptps c on c.btstower_id=a.id where a.active="1" group by a.id,a.name,a.location;


select a.id,a.name,a.location,count(b.id)jmlap,count(c.id)jmlptp from btstowers a left outer join aps b on b.btstower_id=a.id left outer join ptps c on c.btstower_id=a.id where a.active="1" and b.active="1" group by a.id,a.name,a.location;

