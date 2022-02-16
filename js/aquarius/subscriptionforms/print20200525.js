(function($){
    console.log("test 1234:"+$("#clientsiteid").val());
    $.ajax({
        url:'/subscribeforms/getpics/'+$("#clientsiteid").val(),
        type:'post',
        dataType:'json'
    }).done(function(data){
        console.log('USERNAME adl',data["username"]);
        console.log('USERNAME adl',data['billing']['ktp']);
        console.log("Business type",data["businesstype"]["businesstype"]);//Game On Line
        $("#cat-korporasi").html("&#9744;&nbsp;Corporation");
        $("#cat-game").html("&#9744;&nbsp;Game Online");
        $("#cat-perorangan").html("&#9744;&nbsp;Perorangan");
        $("#cat-lain").html("&#9744;&nbsp;Lainnya");
        switch(data["businesstype"]["businesstype"]){
            case "Corporate":
                $("#cat-korporasi").html("&#9745;&nbsp;Corporation");
            break;
            case "Game On Line":
                $("#cat-game").html("&#9745;&nbsp;Game Online");
            break;
            case "Perorangan":
                $("#cat-perorangan").html("&#9745;&nbsp;Perorangan");
            break;
            default:
                $("#cat-lain").html("&#9745;&nbsp;Lainnya");
            break;
            
        }
        //$('#service').html(data['services']);
        $('#clientaddress').html(data['address']);
        $('#billaddress').html(data['billaddress']);
        console.log('BILL ADDRESS',billaddress);
        $('#description').html(data['description']);
        $('#subscribername').html(data['subscriber']['name']);
        $('#subscriberphone').html(data['subscriber']['telp_hp']);
        $('#subscriberemail').html(data['subscriber']['email']);
        $('#subscriber_id').html(data['subscriber']['ktp']);
        $('#resp_id').html(data['resp']['ktp']);
        $('#respname').html(data['resp']['name']);
        $('#respposition').html(data['resp']['position']);
        $('#respphone').html(data['resp']['telp_hp']);
        $('#respemail').html(data['resp']['email']);
        console.log('data',data);
        switch(data['accounttype']){
            case '0':
                console.log('Akun Baru');
                $('#accounttypenew').html('&#9745;');
                $('#accounttypeexisting').html('&#9744;');
            break;
            case '1':
                console.log('Akun Existing');
                $('#accounttypenew').html('&#9744;');
                $('#accounttypeexisting').html('&#9745;');
            break;
        }

        $('#admname').html(data['adm']['name']);
        $('#admphone').html(data['adm']['telp_hp']);
        $('#admemail').html(data['adm']['email']);

        $('#technicianname').html(data['teknis']['name']);
        $('#technicianphone').html(data['teknis']['telp_hp']);
        $('#technicianemail').html(data['teknis']['email']);

        $('#billingname').html(data['billing']['name']);
        $('#billingphone').html(data['billing']['telp_hp']);
        $('#billingemail').html(data['billing']['email']);

        $('#supportname').html(data['support']['name']);
        $('#supportphone').html(data['support']['telp_hp']);
        $('#supportemail').html(data['support']['email']);

        $("#activationdate").html(data["activationdate"]);
        $("#period1").html(data["period1"]);
        $("#period2").html(data["period2"]);
        $('#clientname').html(data['name']);
        $('#businesstype').html(data['businesstype']);
        $('#clientphone').html(data['phone']);
        $('#clientfax').html(data['fax']);
        if(data["monthlyfee"]["dpp"]==="Rp. 0.00"){
            $("#monthlyfee").html("-");
            $("#monthlyfeetotal").html("");
            $("#monthlyfeeppn").html("");
        }else{
            $("#monthlyfee").html(data["monthlyfee"]["dpp"]);
            $("#monthlyfeetotal").html(data["monthlyfee"]["total"]);
            $("#monthlyfeeppn").html(" + PPN = ");
        }
        if(data["setupfee"]["dpp"]==="Rp. 0.00"){
            $("#setupfee").html("-");
            $("#setupfeeppnlabel").html("");
            $("#setupfeetotal").html("");
        }else{
            $("#setupfee").html(data["setupfee"]["dpp"]);
            $("#setupfeeppnlabel").html(" + PPN = ");
            $("#setupfeetotal").html(data["setupfee"]["total"]);
        }
        
        $("#usernamex").html(data["username"]);
        if(data["devicefee"]["dpp"]==="Rp. 0.00"){
            $("#devicefee").html("-");
            $("#devicefeetotal").html("");
            $("#devicefeeppn").html("");
        }else{
            $("#devicefee").html(data["devicefee"]["dpp"]);
            $("#devicefeetotal").html(data["devicefee"]["total"]);
            $("#devicefeeppn").html("+ PPN = ");
        }
        if(data["otherfee"]["dpp"]==="Rp. 0.00"){
            $("#otherfee").html("-");
            $("#otherfeetotal").html("");
            $("#otherfeeppn").html("");            
        }else{
            $("#otherfee").html(data["otherfee"]["dpp"]);
            $("#otherfeetotal").html(data["otherfee"]["total"]);
            $("#otherfeeppn").html(" + PPN = ");
        }
        $('#siup').html(data['siup']);
        $('#npwp').html(data['npwp']);
        console.log("Setup Fee",data["setupfee"]["dpp"]);
        console.log("Device Fee DPP",data["devicefee"]["dpp"])
        console.log("Monthly Fee DPP",data["monthlyfee"]["dpp"])
        console.log("Other Fee DPP",data["otherfee"]["dpp"])
        window.print();
        //window.location.href = "/pfbses/index/"+client_id;
    }).fail(function(){
        console.log('Tidak dapat retrieve');
    });
}(jQuery))