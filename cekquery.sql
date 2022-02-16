select a.* from install_images a left outer join install_sites b on b.id=a.install_site_id  where b.id = 144 ;

select a.id,a.install_site_id,substring(img,0,10),imgondisk,path from install_images a left outer join install_sites b on b.id=a.install_site_id  where b.id = 144 ;
