/////////// articles hover effect ///////////////
let articles = document.querySelectorAll('.article');
articles.forEach(function(article) {

    article.addEventListener('mouseover', function() {
        article.style = "cursor :pointer;"
        article.children[1].style = "display :block";
        article.children[0].style = "filter :brightness(10%); transition :1.5s";
    });
    article.addEventListener('mouseout', function() {
        article.children[1].style = "display :none";
        article.children[0].style = "filter :brightness(100%); transition :1s";
    });
    article.addEventListener('click', function() {
        document.getElementById('article_name').value = article.children[1].textContent;
        document.getElementById('fetchArticlesForm').submit();
    });

});
/////////// articles hover effect ///////////////

/////////// evaluation process ////////////////
var started = false;
var time = 0;
var timer;
var i = 0;
if (document.getElementById('randomTxt') != null) var _random_words = document.getElementById('randomTxt').textContent.split(' ');
var score = 0;
var random_words;

function start(event) {
    random_words = _random_words.slice();
    if (event.keyCode == 32 && i < random_words.length) {
        if (document.getElementById('typingArea').value.trim().localeCompare(random_words[i].trim()) == 0) {
            console.log(++score);
        }
        document.getElementById('typingArea').value = "";
        i++;
        if (random_words[i] != undefined) {
            var word = " <span style='background-color: #c8e7ff;border-radius: 2px'>" + random_words[i] + "</span> ";
            random_words.splice(i, 1, word);
        }
        document.getElementById('randomTxt').innerHTML = random_words.join(' ');
    }
    if (!started) {
        time = 60;
        started = true;
        timer = setInterval(startTimer, 1000);
        var word = " <span style='background-color: #c8e7ff;border-radius: 2px'>" + random_words[0] + "</span> "; /// highlighting the first word
        random_words.splice(0, 1, word);
        document.getElementById('randomTxt').innerHTML = random_words.join(' ');
    }
}

function startTimer() {
    document.getElementsByClassName('timeB')[0].innerHTML = --time;
    if (time == 0) {
        clearInterval(timer);
        started = false;
        document.getElementById("scorePanel").style = "display :block;";
        document.getElementById("scorePanel").scrollIntoView();
        document.getElementById('result').innerHTML = "Congrats !!! <br><br> You scored : " + score + " wpm";
        resetTimer();
        score = 0;
        time = 0;
        i = 0;
        resetTimer();
    }
}

function PauseContinue() {
    if (parseInt(document.getElementsByClassName('timeB')[0].innerHTML) != 60) {
        if (started) {
            clearInterval(timer);
            started = false;
            document.getElementById('typingArea').disabled = true;
        } else {
            timer = setInterval(startTimer, 1000);
            started = true;
            document.getElementById('typingArea').disabled = false;
        }
    }
}

function resetTimer() {
    clearInterval(timer);
    started = false;
    time = 0;
    score = 0;
    i = 0;
    document.getElementsByClassName('timeB')[0].innerHTML = "60";
    document.getElementById('typingArea').value = "";
}

function retryRandom() {
    document.getElementById("scorePanel").style = "display :none;";
    window.scrollTo(0, 0);
    document.getElementById('randomTxt').innerHTML = _random_words.join(' ');
    resetTimer();
}
/////////// evaluation process ////////////////