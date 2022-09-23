<div class="breadLine">
    <ul class="breadcrumb">
        <li><a href="#">PadiApp</a> <span class="divider">></span></li>                
        <li class="active">Accounting</li>
    </ul>
    <ul class="buttons">
        <li><button class="btn btn-danger" id="logout"> Logout</button></li>
    </ul>
</div>
<script>
    $('#logout').click(function(){
        window.location.href = '/adm/logout';
    })
</script>