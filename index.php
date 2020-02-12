<!DOCTYPE html>
<html>
<head>
<title>Line Tester</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
<div class="super-block">
    <div class="head">
    <div class="head__content">
        <div class="head__result"> <img src="img/1.png"> </div>
        <div class="head__text">
        <h1>The Email Subject Line Tester</h1>
            <a>Boost your email open rates: analyze and improve your subject lines with our free tester before sending out your next campaign.</a>
        </div>
        <div class="head-input">
            <input type="text" class="head-input__text" id="inputField" placeholder="Input the line here">
            <a href="#" class="head-input__btn" id="buttonTest">Test Now</a>
        </div>
    </div>
    </div>

<div class="resultBlock">
    <hr/>
    <div class="content">
    <div class="block2">
        <div class="block2-result">
            <div id="block2-pic"></div>
            <span id="block2__proc"></span>
        </div>
        <div class="block2-text">
            <h1 id="block2-text__h1"></h1>
            <a id="block2-text__a"></a>
        </div>
    </div>
        <hr/>
    </div>

    <p id="Length">Length</p>
    <div class="block3">
        <div class="block3-leftbox">
            <p style="font-size: 30pt" id="block3__lettersCount">42</p>
            <p style="margin-bottom: 2%">Characters</p>
            <div class="lineProgressBar">
                <div id="charactersLineBar"></div>
                <div class="numbersLineBar">
                    <div class="numbersLineBar__value"><span id="block3__span">•</span><span style="margin-left: 2px">0</span></div>
                    <div class="numbersLineBar__value"><span id="block3__span">•</span><span>10</span></div>
                    <div class="numbersLineBar__value"><span id="block3__span">•</span><span>20</span></div>
                    <div class="numbersLineBar__value"><span id="block3__span">•</span><span>30</span></div>
                    <div class="numbersLineBar__value"><span id="block3__span" style="margin-left: 9px">•</span><span>40+</span></div></div>
            </div>
            <p style="font-weight: bold">Character count</p><br>
            <p id="block3__letterCountDescription">Your subject line is a bit long. Subject lines
                with 21-40 characters tend to see higher
                open rates. Can you make yours any
                shorter?</p>

        </div>

        <div class="block3-rightbox">
            <p style="font-size: 30pt" id="block3__wordsCount">8</p>
            <p style="margin-bottom: 2%">Words</p>
            <div class="lineProgressBar">
                <div id="charactersLineBar2"></div>
                <div class="numbersLineBar">
                    <div class="numbersLineBar__value"><span>•</span><span>0</span></div>
                    <div class="numbersLineBar__value"><span>•</span><span>1</span></div>
                    <div class="numbersLineBar__value"><span>•</span><span>2</span></div>
                    <div class="numbersLineBar__value"><span>•</span><span>3</span></div>
                    <div class="numbersLineBar__value"><span>•</span><span>4</span></div>
                    <div class="numbersLineBar__value"><span>•</span><span>5</span></div>
                    <div class="numbersLineBar__value"><span>•</span><span>6+</span></div></div>
            </div>
            <p style="font-weight: bold">Word count</p><br>
            <p id="block3__wordsCountDescription">
            </p>
        </div>
    </div>
    <hr/>
    <p id="Wording">Wording</p>
    <div class="block4">
        <div class="block4-leftbox">
            <img id="helpfulWordsFace" width="50px" height="50px" src="img/face.png" style="margin-bottom: 2%">
            <p id="boldtext">Helpful words</p><br>
            <p id="block4__helpfulWordsDescription"">Your subject line contains helpful words,
                nice! People ate more likely to open emails
                when they see words like these.</p>
            <a id="block4__helpfulWords" style="background-color: rgba(255,54,189,0.76); font-size: 15pt"></a>
        </div>
        <div class="block4-rightbox">
            <img id="negativeWordsFace" width="50px" height="50px" src="img/face.png" style="margin-bottom: 2%">
            <p id="boldtext">Negative words</p><br>
            <p id="block4__negativeWordsDescription1">The words <a id="block4__negativeWords" style="background-color: rgba(255,54,189,0.76)"></a>. are negative. We recommend you don't use them.
            </p>
            <p id="block4__negativeWordsDescription2">Phew! Your subject line doesn’t contain any
                words that could be considered harmful.
            </p>
        </div>
    </div>
    <hr/>
    <div class="block5">
        <p id="SpamFolderAlerts">Spam Folder Alerts</p>
        <div class="block5-rightbox">

            <div class="block5-2ch">
                <img id="spamWordsFace" width="50px" height="50px" src="img/sad_face.png" style="margin: 0 5% 0 0">
                    <div class="block5-2ch__text">
                    <p id="boldtext">Spammy Words</p>
                    <p id="block5__spamWordsDescription1">The words <a id="block5__spamWords" style="background-color: rgba(255,54,189,0.76)">Hello</a>. might land your email in the
                    Spam folder. We recommend you look for an alternative.</p>
                        <p id="block5__spamWordsDescription2">Good job! Spammy characters are nowhere to be found.</p>
                    </div>
            </div>
            <div class="block5-3ch">
                <img id="exPunctuationFace" width="50px" height="50px" src="img/face.png" style="margin: 0 5% 0 0">
                    <div class="block5-3ch__text">
                    <p id="boldtext">Excessive Punctuation</p>
                    <p id="block5__excessivePunctuation1">No excessive punctuation here! Nice work.</p>
                        <p id="block5__excessivePunctuation2">Too much punctuation can harm your open rates.</p>
                    </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="block6">
        <p id="Scannability">Scannability</p>
        <div class="block6-top">
            <p id="block6-top__text1">Capitalization Style</p>
            <p id="block6-top__text2"><span style="background-color: #51faff" id="block6__capStyle">Sentence Case</span></p>
            <p id="block6-top__text3">Bravo! Subject lines perform best when they're
                written in sentence case — like yours.
            </p>
        </div>
        <hr align="center" width="100%" size="1" color="grey" style="margin-bottom: 50px" />
        <div class="block6-bottom">
            <p id="block6-bottom__text1">Use of Numbers</p>
            <p id="block6-bottom__text2"><span id="numbersCount" style="background-color: #af66ff" id="block6__UseOfNumbers">None</span></p>
            <p id="block6-bottom__text3">Numbers help subject lines stand out and are
                proven to increase open rates. Using one in
                yours could make all the difference! If it fits the
                context, of course.
            </p>
        </div>
    </div>
    <hr/>
    <a href="#" class="end-btn">Test Again</a>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/progressBar/progressbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">$(".resultBlock").hide();</script>
</body>
</html>