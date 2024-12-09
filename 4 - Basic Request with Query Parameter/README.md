1 - Create `index.html`

```
under XAMPP -> htdocs -> project_folder -> index.html
```

2 - `index.html`

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Ajax</title>
    <script>

        function ajax_func() {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function(){

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
                {
                    var receiver = document.getElementById('get_data');   

                    // receiver.innerHTML = "All is well";
                    
                    receiver.innerHTML = xmlhttp.responseText;
                }

            }

            xmlhttp.open('GET','process_ajax.php?var1=John&var2=apple', true);

            xmlhttp.send();
        }

    </script>
</head>
<body>

    <button onclick="ajax_func();">Click to retrieve data</button>
    
    <div id="get_data" style="font-weight: bold;"></div>
</body>
</html>
```

3 - Create `process_ajax.php`

```
under XAMPP -> htdocs -> project_folder -> process_ajax.php
```


4 - `process_ajax.php`

```php
<?php

    echo "This is the PHP page<br>";

    $names[] = "Mark";
    $names[] = "John";
    $names[] = "Shaun";
    $names[] = "Harry";
    $names[] = "Walton";
    $names[] = "Lara";

    $c = 1;

    foreach ($names as $name) 
    {
        if ($_REQUEST['var1'] == $name) 
        {
            echo $c . " " . $name . " is the important name<br><br>";        
        }
        else {
            echo $c . " " . $name . "<br>";
        }        

        $c++;
    }

    if (isset($_REQUEST['var2'])) 
    {
        if ($_REQUEST['var2'] == '') 
        {
            echo "We have an empty variable so we&apos;re unable to show you the result.";
        }
        else {
            echo "We have some " . $_REQUEST['var2'] . ". We will eat them";
        }
        
    }
    else {
        echo "Note: Something is more there but not visible because of a variable inside it, which is actually not declared any where.";
    }
    
?>
```

![Image](1.PNG)

![Image](2.PNG)