<?php
$json_test  =  file_get_contents('slides.json');
$json_test =   json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $json_test), true);

if (!$json_test)
    echo 'unable to open file';

$array_response = [];

function clean($string){
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function return_image($string){
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] === '/') {
            return $i + 1;
        }
    }
}

function getBetween($string, $start = "", $end = ""){
    
    if (strpos($string, $start)) { // required if $start not exist in $string
        $startCharCount = strpos($string, $start) + strlen($start);
        $firstSubStr = substr($string, $startCharCount, strlen($string));
        $endCharCount = strpos($firstSubStr, $end);
        if ($endCharCount == 0) {
            $endCharCount = strlen($firstSubStr);
        }
        return substr($firstSubStr, 0, $endCharCount);
    } else {
        return '';
    }
}

 function getPhotoQcm($string){
    $response = '';
    $index = substr_count($string , '/');
    for ($i=0; $i < $index ; $i++) { 
        $element = getBetween($string , '/' , ',');
        $string =  str_replace( '/'.$element.',', '' , $string ); 
        $response .= $element . ';';
    }
    return substr($response, 0, -1) ;
}


$i = 0 ;

foreach ($json_test as $key => $value) {
    if (!empty($value['Arborescence de la slide']) and !empty($value['Step']) and strpos(clean($value['name']) , clean('Indice fin')) == false  ){
        $i ++ ;
        $response =  new stdClass();
        $response->id = $i;
        $response->name = $value['name'];
        $with_subject = clean($value['Arborescence de la slide']);
       
        switch ($with_subject) {
            case strpos($with_subject ,  clean('Palais de lEurope')) == true :
                $response->poi_id = 1;
                break;
            case strpos($with_subject ,  clean('L???Orient Palace')) == true :
                $response->poi_id = 2;
                break;
            case strpos($with_subject,  clean('Mus??e Cocteau')) == true: 
                $response->poi_id = 3;
                break;
            case strpos($with_subject,  clean('Place des Logettes')) == true:
                $response->poi_id = 4;
                break;
            case  strpos($with_subject,  clean('Traverse du Vieux-Ch??teau')) == true:
                $response->poi_id = 5;
                break;
            case  strpos($with_subject,  clean('Point de vue')) == true:
                $response->poi_id = 6;
                break;
            case  strpos($with_subject,  clean('Parvis Basilique')) == true:
                $response->poi_id = 7;
                break;
            case  strpos($with_subject,  clean('Palais des princes')) == true:
                $response->poi_id = 8 ;
                break;
            case  strpos($with_subject,  clean('Place de la mairie')) == true:
                $response->poi_id = 9;
                break;
            case strpos($with_subject,  clean('Palais Lascaris')) == true:
                $response->poi_id = 10;
                break;
            case strpos($with_subject,  clean('Rue du G??n??ral Sarrail')) == true:
                $response->poi_id = 11;
                break; 
            case strpos($with_subject,  clean('Entr??e du village')) == true:
                $response->poi_id = 12;
                break;
            case strpos($with_subject,  clean('H??tel de ville')) == true:
                $response->poi_id = 13;
                break;
            case  strpos($with_subject,  clean('Point de vue')) == true:
                $response->poi_id = 14;
                break;
            case  strpos($with_subject,  clean('Fort')) == true:
                $response->poi_id = 15;
                break;
            case strpos($with_subject,  clean('Centre historique')) == true:
                $response->poi_id = 16;
                break;
            case strpos($with_subject,  clean('Ruines du ch??teau')) == true:
                $response->poi_id = 17;
                break;
            case strpos($with_subject,  clean('Orme centenaire')) == true:
                $response->poi_id = 18;
                break;
            case strpos($with_subject,  clean('Eglise Saint-Barth??lemy')) == true:
                $response->poi_id = 19;
                break;
            case strpos($with_subject,  clean('Tour des Lascaris')) == true:
                $response->poi_id = 20;
                break;
            case  strpos($with_subject,  clean('Troph??e d???Auguste')) == true:
                $response->poi_id = 21;
                break;
            case strpos($with_subject,  clean('Saint-Jean Baptiste')) == true:
                $response->poi_id = 22;
                break;
            case strpos($with_subject,  clean('??glise Saint-Michel')) == true:
                $response->poi_id = 23;
                break;
            case strpos($with_subject,  clean('Mairie')) == true:
                $response->poi_id = 24;
                break;
            case  strpos($with_subject,  clean('Sanctuaire Saint-Joseph')) == true:
                $response->poi_id = 25;
                break;
            case  strpos($with_subject,  clean('Traincremaillere')) == true:
                $response->poi_id = 26;
                break;
            case  strpos($with_subject,  clean('lace des deux')) == true:
                $response->poi_id = 27;
                break;
            case  strpos($with_subject,  clean('Rue du ch??teau')) == true:
                $response->poi_id = 28;
                break;
            case  strpos($with_subject,  clean('??glise Sainte-Marguerite')) == true:
                $response->poi_id = 29;
                break;
            case strpos($with_subject,  clean('Place de la libert??')) == true:
                $response->poi_id = 30;
                break;
            case  strpos($with_subject,  clean('Cadran Solaire')) == true:
                $response->poi_id = 31;
                break;
            case strpos($with_subject,  clean('Hauteurs du village')) == true:
                $response->poi_id = 32;
                break;
            case  strpos($with_subject,  clean('Pont de Sospel')) == true:
                $response->poi_id = 33;
                break;
            case  strpos($with_subject,  clean('Cath??drale Saint-Michel')) == true:
                $response->poi_id = 34;
                break;
            case  strpos($with_subject,  clean('Centre historique')) == true:
                $response->poi_id = 35;
                break;
            case  strpos($with_subject,  clean('Eglise Santa-Maria-in-Albis')) == true:
                $response->poi_id = 36;
                break;
            case strpos($with_subject,  clean('Sentier Saint-Antoine l???Ermite')) == true:
                $response->poi_id = 37;
                break;
            case  strpos($with_subject,  clean('Lavoir')) == true:
                $response->poi_id = 38;
                break;
            case strpos($with_subject,  clean('Couvent des franciscains')) == true:
                $response->poi_id = 39;
                break;
            case  strpos($with_subject,  clean('Centre historique')) == true:
                $response->poi_id = 40;
                break;
            case  strpos($with_subject,  clean('Eglise Notre-Dame de la visitation')) == true:
                $response->poi_id = 41;
                break;
            case  strpos($with_subject,  clean('JB Pachiaudi')) == true:
                $response->poi_id = 42;
                break;
            case  strpos($with_subject,  clean('ch??teau Lascaris')) == true:
                $response->poi_id = 43;
                break;
            case  strpos($with_subject,  clean('Place de Nice')) == true:
                $response->poi_id = 44;
                break;
            default:
               echo $response->name;
        }

        switch ($value['Type de slide']) {
            case strpos('QCM', clean($value['Type de slide'])):
                $response->type_slide_id = 2;
                break;

            case strpos('Info', clean($value['Type de slide'])):
                $response->type_slide_id = 1;
                break;

            case strpos('Question ouverte', clean($value['Type de slide'])):
                $response->type_slide_id = 4;
                break;

            case strpos('QCMPhotos', clean($value['Type de slide'])):
                $response->type_slide_id = 5;
                break;

            case strpos('Orientation', clean($value['Type de slide'])):
                $response->type_slide_id = 3;
                break;
        }

        
        $response->text = $value['Texte slide'];
        if (!empty($value['Pop-up Good answer'])) {
            $reponse->text_success = $value['Pop-up Good answer'];
        }else  $reponse->text_success = "";

        if (!empty($value['Pop-upWronganswer'])) {
            $reponse->text_fail = $value['Pop-upWronganswer'];
        }else  $reponse->text_fail = "";
        

        if (!empty($value['Photo cover slide'])) {
            $index = return_image($value['Photo cover slide']) ;
            $response->cover = '/'.trim(substr($value['Photo cover slide'] , $index));
        }else { $response->cover = null; }


        if (!empty($value['titre Reponses QCM Photo'])) {
            $response->response = getPhotoQcm($value['titre Reponses QCM Photo']); 
        }
        
        
        $response->time = null;
        $response->step = $value['Step'];
        $response->penality = 0;
        $response->response = $value['response'];
        $solution  = explode(';',  $value['response']);
        $response->solution = $solution[0];
        array_push($array_response, $response);
        
    }
   
   
}


foreach ($array_response as  $value) {
    if (!empty($value->poi_id) and !empty($value->name)) {
        var_dump($value);
        echo '<br><br><br>';
    }
   
}