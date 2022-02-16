select * from (select count(nofb)cnt,client_id from fbs where status="1" group by client_id)x where cnt>1;

select nofb,client_id from fbs where status="1" and client_id in (10295,2983,905,251) order by client_id;

--FB yang saya set non aktif karena double aktif

--SBY20210721000905004,SBY20200909000422003,SBY20210125002983003,SBY20210929010295001

select a.nofb,b.name Teknis,b.email emailteknis 
from fbs a left outer join (select distinct nofb,name,email from fbpics where role="teknis") b on b.nofb=a.nofb 
where a.status="1" ;


select a.name,a.nofb,b.name Teknis,b.email,c.name adm,c.email admail
from fbs a left outer join (select distinct nofb,name,email from fbpics where role="teknis") b on b.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="adm" group by nofb,name ) c on c.nofb=a.nofb 
where a.status="1" ;

select a.name,a.nofb,b.name Teknis,b.email,c.name adm,c.email admail
from fbs a left outer join (select distinct nofb,name,email from fbpics where role="bliling") b on b.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="resp" group by nofb,name ) c on c.nofb=a.nofb 
where a.status="1" ;

select a.name,a.nofb,b.name Teknis,b.email,c.name adm,c.email admail
from fbs a left outer join (select distinct nofb,name,email from fbpics where role="subscriber") b on b.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="support" group by nofb,name ) c on c.nofb=a.nofb 
where a.status="1" ;






select a.name,a.nofb,b.name Teknis,b.email emailTS,
c.name Administasi,c.email emailAdm,d.name billing,d.email emailbilling,e.name penanggungjawab,e.email emailpeng,f.name pemohon,f.email emailpemohon,g.name support,e.email emailsupport
from fbs a 
left outer join (select nofb,name,email from fbpics where role="teknis" group by nofb,name ) b on b.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="adm" group by nofb,name ) c on c.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="billing" group by nofb,name ) d on d.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="resp" group by nofb,name ) e on e.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="subscriber" group by nofb,name ) f on f.nofb=a.nofb    
left outer join (select nofb,name,email from fbpics where role="support" group by nofb,name ) g on g.nofb=a.nofb    
where a.status="1" ;




select a.nofb,b.name Teknis,b.email emailTS,
c.name Administasi,c.email emailAdm,d.name billing,d.email emailbilling,e.name penanggungjawab,e.email emailpeng,f.name pemohon,f.email emailpemohon,g.name support,e.email emailsupport
from fbs a 
left outer join (select nofb,name,email from fbpics where role="teknis" group by nofb,name ) b on b.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="adm" group by nofb,name ) c on c.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="billing" group by nofb,name ) d on d.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="resp" group by nofb,name ) e on e.nofb=a.nofb 
left outer join (select nofb,name,email from fbpics where role="subscriber" group by nofb,name ) f on f.nofb=a.nofb    
left outer join (select nofb,name,email from fbpics where role="support" group by nofb,name ) g on g.nofb=a.nofb    
where a.status="1" ;














































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

