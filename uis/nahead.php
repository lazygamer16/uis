<?php
    include('conn.php');
    
    // SQL query to fetch news and announcement.
    $sql = "Select id, title, LEFT(description, 275) as descr, image, date_updated from News ORDER by date_updated DESC Limit 1";
    $sql2 = "Select * from Announcement ORDER by date_updated DESC Limit 1";
    $sql3 = "SELECT * FROM `module` WHERE course='Third Year' Limit 3";
    
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nhead = "<center><h3>Latest News</h3><img src='img/".$row['image'].".jpg' height='200' width='275'></center><h3><a href='list_detail.php?id=".$row['id']."&name=news'>".$row['title'].
                        "<br></a></h3>".$row['descr']."...<br><br><a href='list.php?id=News'>View All News</a>";
        }
    }

?>