<?php /** @noinspection PhpRedundantClosingTagInspection */
$sentence = $_GET['sentence'];
echo json_encode(array(
    "lettersCount" => countingLetters($sentence),
    "wordsCount" => countingWords($sentence),
    "meetingHelpfulWords" => checkingHelpfulWords($sentence),
    "meetingNegativeWords" => checkingNegativeWords($sentence),
    "spamWords" => spammyWords($sentence),
    "excessivePunctuation" => excessivePunctuation($sentence),
    "CapStyle" => capitalizationStyle($sentence),
    "useOfNumbers" => useOfNumbers($sentence)
));

    function countingLetters($sen){
        return strlen(preg_replace('/[^a-zA-Z\d]/', '', $sen));
    }

    function countingWords($sen){
        return str_word_count(preg_replace('/[^ a-zA-Z \d]/ui', '', $sen));
    }

    function useOfNumbers($sen){
        preg_match_all('/[0-9]/', $sen, $matches);
        return $matches;
    }

    function checkingHelpfulWords($sen){
        $meetingHelpfulWords = array();
        $words = str_word_count($sen, 1);
        for($i = 0;$i < count($words);$i++){
            $words[$i] = mb_strtolower($words[$i]);
        }
        $fWords = file('files\\helpfulWords.txt', FILE_IGNORE_NEW_LINES);
        for($i = 0;$i < count($fWords);$i++){
            $fWords[$i] = mb_strtolower($fWords[$i]);
        }
        $meetingHelpfulWords = array_intersect($words,$fWords);
        return $meetingHelpfulWords;
    }

    function checkingNegativeWords($sen){
        $meetingNegativeWords = array();
        $words = str_word_count($sen, 1);
        for($i = 0;$i < count($words);$i++){
           $words[$i] = mb_strtolower($words[$i]);
        }
        $fWords = file('files\\negativeWords.txt', FILE_IGNORE_NEW_LINES);
        for($i = 0;$i < count($fWords);$i++){
            $fWords[$i] = mb_strtolower($fWords[$i]);
        }
        $meetingNegativeWords = array_intersect($words, $fWords);
        return $meetingNegativeWords;
    }

    function spammyWords($sen)
    {
        $spamFileWords = array();
        $spamWords = array();
        $handle = fopen("files\\spam_words.txt", "r");
        $buffer = fgets($handle, 6100);
        $spamFileWords = explode(',', $buffer);
        fclose($handle);
        $sen = strtolower($sen);
        for ($i = 0; $i < count($spamFileWords); $i++) {
            $spamFileWords[$i] = strtolower($spamFileWords[$i]);

            if(mb_ereg_match(".*\b".$spamFileWords[$i]."\b.*", $sen)){
                array_push($spamWords, $spamFileWords[$i]);
            }
        }
        return $spamWords;
    }

    function excessivePunctuation($sen){

        $matches = array();
        preg_match_all('/([^a-zA-Z0-9\s_]{2,})|( ){1,}(,|\.|!|\?|;|:)/',$sen, $matches);

        if($matches[0] != null)
            return true;    // если есть излишняя пунктуация
        else
            return false;   // если нет
    }

    function capitalizationStyle($sen){
        $words = str_word_count($sen, 1);
        $sen = trim($sen);
        $titCaseVar = true;
        $capStyVar = null;

        if(mb_ereg_match('(^[a-z].* ?(\.|!|\?) ?[A-Z])|((((\.|!|\?))|((\.|!|\?) ))[a-z].* ?(\.|!|\?) ?[A-Z])',$sen)){
            $capStyVar = "Mixed case";
        }elseif(mb_ereg_match('^[a-z].*( ?(\.|!|\?) ?[a-z])?', $sen)){
            $capStyVar = "Lower case";
        }elseif(mb_ereg_match('(^[A-Z].* ?(\.|!|\?) ?[a-z])|((((\.|!|\?))|((\.|!|\?) ))[A-Z].* ?(\.|!|\?) ?[a-z])',$sen)){
            $capStyVar = "Mixed case";
        }elseif ($sen == strtoupper($sen)){
            $capStyVar = "All caps";
        }elseif($sen == ucwords($sen)){
            $capStyVar = "Title case";
        }elseif (mb_ereg_match('^(([A-Z].*((\.|!|\?){1,}? ?[a-z]))|[a-z])', $sen) != true){
            $capStyVar = "Sentence case";
        }
        return $capStyVar;
    }
?>