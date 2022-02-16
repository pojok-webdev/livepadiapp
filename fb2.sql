select distinct 
A.nofb,A.name,A.client_id TS,B.email TSmail,C.name ADM,C.email ADMmail,D.name PENANGGUNGJAWAB,D.email PENANGGUNJAWABmail 
,E.name BILLING,E.email BILLINGmail,F.name SUPPORT,F.email SUPPORTmail,G.name PEMOHON,G.email PEMOHONmail
from 
(select distinct client_id,trim(nofb)nofb,name from fbs a where status="1")A
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name Teknis,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="teknis") b on b.nofb=a.nofb 
where a.status="1") B on B.nofb=A.nofb
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name Teknis,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="adm") b on b.nofb=a.nofb 
where a.status="1" 
) C on C.nofb=A.nofb and C.name=A.name
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name Teknis,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="resp") b on b.nofb=a.nofb 
where a.status="1" ) D
on D.nofb=A.nofb
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name Teknis,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="billing") b on b.nofb=a.nofb 
where a.status="1" )E
on E.nofb=A.nofb
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name Teknis,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="support") b on b.nofb=a.nofb 
where a.status="1" ) F
on F.nofb=A.nofb
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name Teknis,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="subscriber") b on b.nofb=a.nofb 
where a.status="1" ) G
on G.nofb=A.nofb 
;
limit 1,600;


select distinct 
A.nofb,A.name,A.client_id ,B.picname TS,B.email TSmail
from 
(select distinct client_id,trim(nofb)nofb,name from fbs a where status="1")A
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name picname,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="teknis" group by trim(nofb)) b on b.nofb=a.nofb 
where a.status="1") B on B.nofb=A.nofb order by A.client_id asc
;


select distinct 
A.nofb,A.name,A.client_id ,B.picname TS,B.email TSmail
from 
(select distinct client_id,trim(nofb)nofb,name from fbs a where status="1")A
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name picname,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="subscriber" group by trim(nofb)) b on b.nofb=a.nofb 
where a.status="1") B on B.nofb=A.nofb order by A.client_id asc
;




select distinct 
A.nofb,A.name,A.client_id ,B.picname TS,B.email TSmail
from 
(select distinct client_id,trim(nofb)nofb,a.name from fbs a left outer join clients b on b.id=a.client_id where a.status="1" and b.active="1")A
left outer join
(select distinct a.name,trim(a.nofb)nofb,b.name picname,b.email 
from fbs a left outer join (select distinct trim(nofb)nofb,name,email from fbpics where role="subscriber" group by trim(nofb)) b on b.nofb=a.nofb 
where a.status="1") B on B.nofb=A.nofb order by A.client_id asc
;
