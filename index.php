<?php

require "classes/LangController.php";
$lang_controller = new LangController;

if(isset($_GET['lang']) && $_GET['lang']!='' ){
    $lang_controller->setCurrentLang($_GET['lang']); // dont trust this .. validate before passing it
    header("Location: index.php");
}

// echo "<pre>", print_r($lang_controller->getLangList()), "</pre>";
$language = $lang_controller->init();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$language['_title'];?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1><?=$language['login']?></h1>
    <p>Current Lang: <?=$lang_controller->langIDMap[ $lang_controller->getCurrentLang() ]?></p>
    <form action="">
        <select name="lang">
            <?php foreach($lang_controller->getLangList() as $langID => $langName): ?>
                <option value="<?=$langID?>"><?=$langName?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit"  value="Select">
    </form>
    </body>
</html>