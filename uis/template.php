    <?php       
    echo
        "<div id='top'>
            <center><img src='img/itb.png'></center>
        </div>
        <div id='main'>
            <nav id='tab'>
                <a href='home.php'>Home</a> |
                <a href='list.php?id=news'>News</a> |
                <a href='list.php?id=announcement'>Announcement</a> |
                <a href='module.php'>Module</a> |
                <a href='marks.php'>Student Marks</a> |
				<a href='about.php'>About</a>
            </nav>
            <div id='status'>
                <b id='welcome'>Welcome : <i>"
    ?>
    
    <?php echo $login_session; ?>
                
    <?php echo            
            "</i></b>
                <b id='logout'><a href='logout.php'>Log Out</a></b>
            </div>"
    ?>        