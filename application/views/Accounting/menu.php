<div class="menu">                
        
        <div class="breadLine">            
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, <?php echo $this->session->userdata('username');?>
            </div>
        </div>
        
        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>                
            </div>
            <ul class="control">                
                <li><span class="icon-comment"></span> <a href="/">Messages</a> <a href="messages.html" class="caption red">12</a></li>
                <li><span class="icon-cog"></span> <a href="/">Settings</a></li>
                <li><span class="icon-share-alt"></span> <a href="/adm/logout">Logout</a></li>
            </ul>
            <div class="info">
                <span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
            </div>
        </div>
        
        <ul class="navigation">            
            <?php if(1===3){?>    
            <li>
                <a href="index.html">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <?php }?>
            <li class="active">
                <a href="/accounting/devices">
                    <span class="isw-archive"></span><span class="text">Master Perangkat</span>                 
                </a>
            </li>                         
            <li class="">
                <a href="/accounting/materials">
                    <span class="isw-archive"></span><span class="text">Master Material</span>                 
                </a>
            </li>
            <li class="">
                <a href="/accounting/surveys">
                    <span class="isw-archive"></span><span class="text">Survey</span>
                </a>
            </li>
            <li class="">
                <a href="/accounting/installs">
                    <span class="isw-archive"></span><span class="text">Install</span>
                </a>
            </li>
            <li class="">
                <a href="/accounting/troubleshoots">
                    <span class="isw-archive"></span><span class="text">Troubleshoots</span>
                </a>
            </li>
        </ul>
    </div>
