$('#buttonTest').click( function () {
    let sentence = $("#inputField").val().trim();
    if(sentence != "") {
        $('#block2-text__h1').text(sentence);
    $.get("func.php", {sentence: sentence}).done( function (results) {
        $(".resultBlock").show();
        results = JSON.parse(results);
        let totalMark=0;
        let helpfulWords = [];
        let negativeWords = [];
        let spamWords = [];
        for(let i=0;i<results.wordsCount;i++){
            if(results.meetingHelpfulWords[i] !==undefined){
               helpfulWords.push(results.meetingHelpfulWords[i]);
            }
            if(results.meetingNegativeWords[i] !== undefined){
                negativeWords.push(results.meetingNegativeWords[i]);
            }
            if(results.spamWords[i] !== undefined){
                spamWords.push(results.spamWords[i]);
            }
        }

         $('#block3__lettersCount').text(results.lettersCount);
         if(results.lettersCount>20 && results.lettersCount <=40){
             totalMark+=12;
             $("#block3__letterCountDescription").text("Not too long, not too short. Your subject line is the ideal length. Subject lines this long look good on all devices and see higher open rates.");

         }else if(results.lettersCount <= 20){
             $("#block3__letterCountDescription").text("Your subject line is a bit short. Subject lines with 21-40 characters tend to see higher open rates. Can you make yours any longer?");
         }else{
             $("#block3__letterCountDescription").text("Your subject line is a bit long. Subject lines with 21-40 characters tend to see higher open rates. Can you make yours any shorter?");
         }
         $('#block3__wordsCount').text(results.wordsCount);
        if(parseInt(results.wordsCount)>=4 && parseInt(results.wordsCount) <=6){
            totalMark+=14;
            $("#block3__wordsCountDescription").text("This is the ideal number of words. Nice work!");

        }else if(parseInt(results.wordsCount) < 4){
            $("#block3__wordsCountDescription").text("Your subject line contains fewer than 4 words. This might affect your open rates. We recommend you aim for 4-6 words instead.");
        }else {
            $("#block3__wordsCountDescription").text("Your subject line contains more than 6 words. This might affect your open rates. We recommend you aim for 4-6 words instead.");
        }
        $("#block4__helpfulWords").text(helpfulWords);
        if(helpfulWords.length > 0){
            $("#helpfulWordsFace").attr("src","img/face.png");
            $("#block4__helpfulWordsDescription").text("Your subject line contains helpful words, nice! People ate more likely to open emails when they see words like these.")
            $("#block4__helpfulWords").text(helpfulWords);
            totalMark+=12;
        }else{
            $("#helpfulWordsFace").attr("src","img/sad_face.png");
            $("#block4__helpfulWordsDescription").text("Oh, your subject line doesn’t contain any helpful words. People are more likely to open emails when they see some actionable, eye-catching words in the subject line.");}

        if(negativeWords.length > 0){
            $("#negativeWordsFace").attr("src","img/sad_face.png");
            $("#block4__negativeWords").text(negativeWords);
            $("#block4__negativeWordsDescription1").show();
            $("#block4__negativeWordsDescription2").hide();

        }else{
            $("#negativeWordsFace").attr("src","img/face.png");
            $("#block4__negativeWordsDescription1").hide();
            $("#block4__negativeWordsDescription2").show();
            totalMark+=12;
        }

        if(spamWords.length == 0){
            totalMark+=14;
            $("#spamWordsFace").attr("src","img/face.png");
            $("#block5__spamWordsDescription1").hide();
            $("#block5__spamWordsDescription2").show();

        }else{
            $("#spamWordsFace").attr("src","img/sad_face.png");
            $("#block5__spamWordsDescription1").show();
            $("#block5__spamWordsDescription2").hide();
            $("#block5__spamWords").text(spamWords);
        }
        $("#block5__excessivePunctuation").text(results.excessivePunctuation);
        if(results.excessivePunctuation == false){
            totalMark += 12;
            $("#exPunctuationFace").attr("src","img/face.png");
            $("#block5__excessivePunctuation1").show();
            $("#block5__excessivePunctuation2").hide();

        }else{
            $("#exPunctuationFace").attr("src","img/sad_face.png");
            $("#block5__excessivePunctuation2").show();
            $("#block5__excessivePunctuation1").hide();
        }

        $("#block6__capStyle").text(results.CapStyle);
        if(results.CapStyle == "Sentence case"){
            $("#block6-top__text3").text("Bravo! Subject lines perform best when they’re written in sentence case – like yours.");
            totalMark += 12;
        }else if(results.CapStyle == "Mixed case" || results.CapStyle == "Title case" || results.CapStyle == "Lower case"){
            $("#block6-top__text3").text("Your subject line doesn’t seem to be written in sentence case. Subject lines written in sentence case perform best. Consider using capital letters at the beginning and for proper nouns, and lowercase letters elsewhere.");
            totalMark += 8;
        }else{
            $("#block6-top__text3").text(". . .");
            totalMark += 0;
        }

        $("#block6__UseOfNumbers").text(results.useOfNumbers);
        if(results.useOfNumbers[0].length >= 1){
            totalMark+=12;
            if((results.useOfNumbers[0]).length == 1){
                $("#numbersCount").text(results.useOfNumbers[0].length + " number");
            }else{
                $("#numbersCount").text(results.useOfNumbers[0].length +  " numbers");
            }
            $("#block6-bottom__text3").text("Numbers are proven to increase open rates. Good job including one in yours!");

        }else{
            $("#numbersCount").text("None");
            $("#block6-bottom__text3").text("Numbers help subject lines stand out and are proven to increase open rates. Using one in yours could make all the difference! If it fits the context, of course.");
        }

        if(totalMark == 100){
            $("#block2-text__a").text("Incredible! You’ve mastered the art of writing the perfect subject line.");
        }else if(totalMark<100 && totalMark>0){
            $("#block2-text__a").text("Nice! A few small tweaks and you're good to go. See below for suggestions on how to make your subject line more impactful.");
        }
//Circle progress bar*(^_^)*
       // let ProgressBar = require('progressBar/progressbar.js');
        $("#block2-pic").text("");
        let bar = new ProgressBar.Circle('#block2-pic', {
            color: '#aaa',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 8,
            trailWidth: 8,
            easing: 'easeInOut',
            duration: 1400,
            text: {
                autoStyleContainer: false
            },
            from: {color: '#c2b2ff', width: 8},
            to: {color: '#c2b2ff', width: 8},
            // Set default step function for all animate calls
            step: function (state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                let value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('0');
                } else {
                    circle.setText( + value + "%");
                }

            }
        });
        bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
        bar.text.style.fontSize = '0px';
        $("#block2__proc").text(totalMark+"%");
        bar.animate(totalMark/100);

        //progress line of LETTERS count
        $("#charactersLineBar").text("");
        let bar1 = new ProgressBar.Line("#charactersLineBar", {
            strokeWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            from: {color: '#ffdfa6'},
            to: {color: '#ffdfa6'},
            step: (state, bar1) => {
                bar1.path.setAttribute('stroke', state.color);
            }
        });
        let countLettersBar;
        if((parseInt(results.lettersCount)*2) > 100){
            countLettersBar = 100;
        }else{
            countLettersBar = (parseInt(results.lettersCount)*2);
        }
        bar1.animate(countLettersBar/100);

        //PROGRESS ;INE OF WORDS COUNT
        $("#charactersLineBar2").text("");
        let bar2 = new ProgressBar.Line("#charactersLineBar2", {
            strokeWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            from: {color: '#ffdfa6'},
            to: {color: '#ffdfa6'},
            step: (state, bar2) => {
                bar2.path.setAttribute('stroke', state.color);
            }
        });
        let countWordsBar;
        countWordsBar = parseInt(results.wordsCount)*(100/7);
        if(countWordsBar > 100){
            countWordsBar = 100;
        }
        bar2.animate(countWordsBar/100);
console.log(totalMark);
    });
    }
});