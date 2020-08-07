
<html>
 
  <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Modak&display=swap" rel="stylesheet">
    
   
      
  </head>
  <body>
  <script>
  window.watsonAssistantChatOptions = {
      integrationID: "3885a5a8-4a4e-4df0-b140-319fdd2eb27a", // The ID of this integration.
      region: "au-syd", // The region your integration is hosted in.
      serviceInstanceID: "c24cc8a1-35c6-4b06-944f-eae3a23a0736", // The ID of your service instance.
      onLoad: function(instance) { instance.render(); }
    };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
    document.head.appendChild(t);
  });
</script>
    <?php
    include 'DB_con.php';

     $conn = OpenCon();
     ?>
     <div class="header">
      <lable class= "f">Robot control</lable>
    </div>
     
   
     <div>
     <form method="post" action="first_page.php">
    <center><img src="robot.PNG" ></img></center>
      <div id = "control">
     
      <br>
     <center><button class = "myButton" id = "forward" name = "forward"value ="forward">forward</button></center>
      <br><br>
     <center>
      <button class = "myButton" id = "right" name = "right"value="right">right</button>
      
      <button class = "myButton" id= "Stop"name = "Stop"value ="Stop">Stop</button>
      
      <button class = "myButton" id = "left"name = "left"value ="left">left</button>
    </center><br><br>
      <center><button class = "myButton" id= "back"name = "back"value="back">back</button></center>
      <br>
    </form>
     </div>
     <div>
      
      
      <form method="post" action="first_page.php">
      <label >distance:</label><br>
      <input type="text" id="distance" name="distance" value="">
      <button class = "myButton" id = "forward" name = "forward2"value ="forward">forward</button>
      <button class = "myButton" id = "right" name = "right2"value="right">right</button>
      <button class = "myButton" id = "left"name = "left2"value ="left">left</button>
      <?php
      echo"<table>";
      echo '<tr> <th> ID</th>
      <th>direction</th>
      <th>distance	</th>
      <th>Delete</th></tr>';
      $result =$conn->query("select*from map");
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['direction'] . "</td>";
        echo "<td>" . $row['distance'] . "</td>";
        echo "<td> <a href=\"delete.php?id=".$row['id']."\">delete</a></td>";
        echo "</tr>";
      }
      echo '</table>';
     ?>
      </form>
     
     </div>
     <?php
if(isset($_POST["delete"])){

}
if(isset($_POST["forward2"])){
    $d = "forward";
    $b = $_POST["distance"];
    $sql = "INSERT INTO map (direction,distance)VALUES ('$d','$b')";
    $conn->query($sql);
    header('Location: first_page.php');
    
    }
if(isset($_POST["right2"])){
        $d = "right";
        $b = $_POST["distance"];
        $sql = "INSERT INTO map (direction,distance)VALUES ('$d','$b')";
        $conn->query($sql);
        header('Location: first_page.php');
        
}
if(isset($_POST["left2"])){
            $d = "left";
            $b = $_POST["distance"];
            $sql = "INSERT INTO map (direction,distance)VALUES ('$d','$b')";
            $conn->query($sql);
            header('Location: first_page.php');
            
}
if(isset($_POST["forward"])){
    $d = "forward";
    $sql = "INSERT INTO remot (word,letter)VALUES ('forward','F')";
    $conn->query($sql);
    header('Location: f.html');
    
    }
        

elseif(isset($_POST["left"])){
    $sql = "INSERT INTO remot (word,letter)VALUES ('left','L')";
    $conn->query($sql);
    header('Location: L.html');
}
elseif(isset($_POST["right"])){
    $sql = "INSERT INTO remot (word,letter)VALUES ('right','R')";
    $conn->query($sql);
    
    header('Location: R.html');
}
elseif(isset($_POST["back"])){
    $sql = "INSERT INTO remot (word,letter)VALUES ('back','B')";
    $conn->query($sql);
    header('Location: B.html');
}
CloseCon($conn);

?>
  </body>  
</html>