<?php
       
       $text=urlencode($_REQUEST['clima']);

        $url="http://api.mymemory.translated.net/get?q=$text&langpair=en|es";
        $json = file_get_contents($url);

        if (!empty($json)) { 
        $obj = json_decode($json);

         $clima= $obj->responseData->translatedText;

         $response=new stdClass();
         $response->clima=$clima;

         echo json_encode($response);
         //echo $temperatura." °C";
       }
?>