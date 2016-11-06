<?php

require "../vendor/autoload.php";
use Stichoza\GoogleTranslate\TranslateClient;
/*
* To auto translate class given language array in file lang_en.php
* it depends upon this https://github.com/Stichoza/google-translate-php
* Thanks to Stichoza for making this wonderful lib
*/
class AutoTranslate{
    /**
    * @param $languageID (array) id's of languges
    * @return null
    * Create lang translation file like lang_en.php for languages passed in @param
    */
    function  __construct(array $languageID){
        foreach($languageID as $lID){
            $tr = new TranslateClient('en', $lID);


            include "lang_en.php";

            $tmp = $language;
            $translated = '<?php'.PHP_EOL.'$language= ['.PHP_EOL."\t'file'\t=> 'lang_{$lID}.php',".PHP_EOL;
            foreach($tmp as $k => $v){
                $v2 = $v;
                if($k[0] !== "_"){
                    $v2 = $tr->translate($v);
                }
                $translated .= "\t'$k'\t=> '$v2',\n";
            }
            $translated .= '];';
            file_put_contents("lang_{$lID}.php", $translated);
            echo $translated,"<br>";
        }
    }
}

/**
* @param $languagesID (array) id's of language
*/
// insert you required language ids here from list below
$languagesID = ['ar'];
$autoTranslate = new AutoTranslate($languagesID);


/*
        'af'        => "Afrikaans",
        'sq'        => "Albanian",
        'ar'        => "Arabic",
        'be'        => "Belarusian",
        'bg'        => "Bulgarian",
        'ca'        => "Catalan",
        'zh-cn'     => "Chinese (Simpl)",
        'zh-tw'     => "Chinese (Trad)",
        'hr'        => "Croatian",
        'cs'        => "Czech",
        'da'        => "Danish",
        'nl'        => "Dutch",
        'en'        => "English",
        'et'        => "Estonian",
        'tl'        => "Filipino",
        'fi'        => "Finnish",
        'fr'        => "French",
        'gl'        => "Galician",
        'de'        => "German",
        'el'        => "Greek",
        'ht'        => "Haitian Creole",
        'iw'        => "Hebrew",
        'hi'        => "Hindi",
        'hu'        => "Hungarian",
        'is'        => "Icelandic",
        'id'        => "Indonesian",
        'ga'        => "Irish",
        'it'        => "Italian",
        'ja'        => "Japanese",
        'ko'        => "Korean",
        'lv'        => "Latvian",
        'lt'        => "Lithuanian",
        'mk'        => "Macedonian",
        'ms'        => "Malay",
        'mt'        => "Maltese",
        'no'        => "Norwegian",
        'fa'        => "Persian",
        'pl'        => "Polish",
        'pt'        => "Portuguese",
        'ro'        => "Romanian",
        'ru'        => "Russian",
        'sr'        => "Serbian",
        'sk'        => "Slovak",
        'sl'        => "Slovenian",
        'es'        => "Spanish",
        'sw'        => "Swahili",
        'sv'        => "Swedish",
        'th'        => "Thai",
        'tr'        => "Turkish",
        'uk'        => "Ukrainian",
        'vi'        => "Vietnamese",
        'cy'        => "Welsh",
        'yi'        => "Yiddish",
*/