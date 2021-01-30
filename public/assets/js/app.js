/////////// categories hover effect ///////////////
let categories = document.querySelectorAll('.category');
categories.forEach(function(category) {

    category.addEventListener('mouseover', function() {
        category.style = "cursor :pointer;"
        category.children[1].style = "display :block";
        category.children[0].style = "filter :brightness(10%); transition :2s";
    });
    category.addEventListener('mouseout', function() {
        category.children[1].style = "display :none";
        category.children[0].style = "filter :brightness(100%); transition :1s";
    });
    category.addEventListener('click', function() {
        document.getElementById('cat_name').value = category.children[1].textContent;
        document.getElementById('fetchArticlesForm').submit();
    });

});
/////////// categories hover effect ///////////////

/////////// evaluation process ////////////////
var started = false;
var time = 0;
var timer;
var i = 0;
var _random_words = document.getElementById('randomTxt').textContent.split(' ');
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