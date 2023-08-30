<?php
       
       $text=trim(urlencode($_REQUEST['clima']));

     //  $text=preg_replace('([^A-Za-z0-9])', '', $text);

        $url="http://api.mymemory.translated.net/get?q=$text&langpair=en|es";
        $json = file_get_contents($url);

        if (!empty($json)) { 
        $obj = json_decode($json);

         echo $clima= $obj->responseData->translatedText;

         exit();

         $response=new stdClass();
         $response->clima=$clima;

         echo json_encode($response);
         //echo $temperatura." °C";
       }
?>