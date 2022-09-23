sendDiscord = (obj,server) => {
    console.log("send Discord invoked")
    const request = new XMLHttpRequest();
    recipient = 
        {
            'padi':'https://discord.com/api/webhooks/968355621315440710/DWoHREXDev8wVpLHiLMh_teoGIUHqGLOAcUEr-d3nEHS1h5GuxIy15sIhPTlzudpiIrr',
            'puji':'https://discord.com/api/webhooks/968348600352538664/L7iBCxbkToyXCVCLC53TehEcAOD0z7Mdg_qJ9-POJGo0SxodH0b52gLFaU3YPNbkdXls'
        }
    request.open("POST", recipient[server]);
    request.setRequestHeader('Content-type', 'application/json');
    content = obj.kdticket+"-"+obj.clientname+"-"+obj.complaint+'-'+obj.reporter+'-'+obj.reporterphone
    const param2 = {
        username:"PadiApp-Ticket"+"-"+obj.kdticket+"-"+obj.createuser,
        avatar_url:"",
        content:content
    }
    request.send(JSON.stringify(param2));
}