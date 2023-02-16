<?php
$msg = "";
$searchText = "";
$simpsons = array("Homer", "Marge", "Bart", "Lisa", "Maggie", "Santa's Little Helper", "Grandpa");
$familyGuy = array("Peter", "Louis", "Meg", "Chris", "Stewie", "Brian", "Quagmire", "Cleveland", "Joe");
$futurama = array("Fry", "Leela", "Bender", "Neebler", "Amy", "Professor", "Zoidberg", "Hermes");

if(isset($_GET["search"])){
    $searchText = $_GET["text-search"];
    $selectedSeries = $_GET["series"];

    if(is_string($searchText) && $searchText != ""){
        $msg .= "<p>You have entered a valid String.</p><br/>";
    }else if(!is_string($searchText)){
        $msg .= "<p>Please enter String values only.</p><br/>";
    }else if($searchText == ""){
        $msg .= "<p>To search for a character, enter a character.</p><br/>";
    }else{
        $msg .= "<p>Sorry, please enter a valid String.</p><br/>";
    }

    $msg = "<h3>Character Names: </h3>";
    $msg .= "<ul>";

    if($selectedSeries == "simpsons"){
        foreach($simpsons as $element){
            if($searchText == $element){
                $msg .= "<li><b>" . $element . "</b></li>";
            }else{
                $msg .= "<li>" . $element . "</li>";
            }
        }
    }else if($selectedSeries == "familyguy"){
        foreach($familyGuy as $element){
            if($searchText == $element){
                $msg .= "<li><b>" . $element . "</b></li>";
            }else{
                $msg .= "<li>" . $element . "</li>";
            }
        }
    }else if($selectedSeries == "futurama"){
        foreach($futurama as $element){
            if($searchText == $element){
                $msg .= "<li><b>" . $element . "</b></li>";
            }else{
                $msg .= "<li>" . $element . "</li>";
            }
        }
    }else{
        if($selectedSeries == ""){
            $msg .= "<li>Choose a Series.</li>";
        }else{
            $msg .= "<li>Character cannot be found.</li>";
        }
    }
}

$msg .= "</ul>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display and Search Arrays with PHP</title>
</head>
<body>
    <div>
        <h1>Display and Search Arrays with PHP</h1>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="get">
            <label for="text-search">Character Name: </label>
            <input id="text-search" value="<?= $searchText ?>" name="text-search" type="text" placeholder="Enter a Character."  />
            <label for="series">Cartoon Series: </label>
            <select id="series" name="series">
                <option value="" selected>--- Choose a Series ---</option>
                <option value="simpsons">Simpsons</option>
                <option value="familyguy">Family Guy</option>
                <option value="futurama">Futurama</option>
            </select>
            <input id="text-submit" value="Submit" type="submit" name="search"/>
        </form>

        <div>
            <?= $msg ?>
        </div>
    </div>
</body>
</html>