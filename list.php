<html>

<head>

    <style>

        .cent{
            margin-left:40%;
        }
        .initial {
            color: green;
            text-decoration: none;
        }
        .color{
        
            color: green;
        }
    </style>

    <script>
        
        function loadDocument() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    var jsonData = JSON.parse(xhttp.responseText);
                }
            }
            xhttp.open("GET", "dictionary.json", true);
            xhttp.send();
        }
    </script>

</head>

<body>
    <div class = "cent">

        <h1 style="color:green" > Dictionary</h1> Search Word:
        <form name="dictionary" id="form" method="POST">
            <input id="text" type="text" name="text" value="">

            <input id="button" type="submit" name="button" value="Search">
        </form>

    </div>

    <div style = "margin-left:40%">
        <?php
    $str = file_get_contents('dictionary.json');
    $json = json_decode($str, true); // decode the JSON into an associative array
    $flag= false;;
    if(isset ($_POST['button'])){
    search();
    }
    function search(){
       global $flag;
        global $json;
        $word = $_POST['text'];
        foreach($json as $var => $x_value) {
       if (strcasecmp($var, $word)==0){
           echo "<h3> " . $var .  " </h3><br>" . $x_value;
           $flag=true;
       }
    }
    if($flag==false){
        
           echo "<h3 class='color'> Word not found in dictionary </h3>";
        
            }   
        
        }
?>

            </ul>
        </div>

    </body>
</html>
