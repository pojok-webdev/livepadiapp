var serverRole = 'laptop',/*ganti untuk masing-masing server yang berbeda (simulasi,database,laptop)*/
	ipaddr='',
	baseurl='',
	thisdomain='',
	marketingmail='',
	tsmail='',developermail='puji@padi.net.id';
switch(serverRole){
	case 'laptop':
		ipaddr = 'localhost';
		baseurl = 'http://livepadiapp/';
		thisdomain = 'http://livepadiapp/';
		marketingmail = 'puji@padi.net.id';
		tsmail = 'puji@padi.net.id';
	break;
	case 'padi-customer':
		ipaddr = 'localhost';
		baseurl = 'http://padi-customer/';
		thisdomain = 'http://padi-customer/';
		marketingmail = 'puji@padi.net.id';
		tsmail = 'puji@padi.net.id';
	break;
	case 'simulasi':
		ipaddr = 'localhost';
		baseurl = 'http://simulasi.padinet.com/';
		thisdomain = 'http://simulasi.padinet.com/';
		marketingmail = 'puji@padi.net.id';
		tsmail = 'puji@padi.net.id';
	break;
	case 'database':
		ipaddr = 'localhost';
		baseurl = 'https://database.padinet.com/';
		thisdomain = 'https://database.padinet.com/';
		marketingmail = 'marketing@padi.net.id';
		tsmail = 'ts@padi.net.id';
	break;
}
