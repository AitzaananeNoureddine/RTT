$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#postContent").emojioneArea({
        filtersPosition: "bottom",
        events: {
            keydown: function(editor, event) {
                if (event.keyCode == 13) Post($('#articleId').val());
            }
        }
    });
});
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
        document.getElementById('article_id').value = article.children[2].textContent;
        console.log(document.getElementById('article_id').value);
        document.getElementById('fetchArticleForm').submit();
    });

});
/////////// articles hover effect ///////////////

/////////// evaluation process ////////////////
var started = false;
var time = 0;
var timer;
var i = 0;
var k = 0;
var l = 0;
var j = 0;
var randomTxt = document.getElementById('randomTxt');
if (randomTxt != null) {
    var _random_words = randomTxt.textContent.trim();
    var _random_words = _random_words.split(' ');
    for (j = 0; j < _random_words.length; j++) {
        if (_random_words[j].length == 0) _random_words.splice(j, 1);
    }
    var randomTxtHeight = randomTxt.offsetHeight;
    var randomTxtWidth = randomTxt.offsetWidth;
    var lineHeight = document.defaultView.getComputedStyle(randomTxt, null).getPropertyValue("line-height").split("px");
    lineHeight = parseInt(lineHeight[0]);
    var lines = Math.round(randomTxtHeight / lineHeight);
    randomTxt.style.height = "20rem";
    let limit = Math.floor((randomTxtWidth - 280) / wordWidth("A", "font-family: 'Space Mono', monospace"));
    let reg = new RegExp(".{1," + limit + "}", "g");
    let linesContent = randomTxt.innerHTML.match(reg);
    var LineWords = {};
    if (linesContent != null) {
        for (j = 0; j < linesContent.length; j++) {
            LineWords[j] = linesContent[j].split(' ').length;
        }
    }
}
var score = 0;
var random_words;
var wordCount;

function start(event) {
    document.getElementById("scorePanel").style = "display :none;";
    random_words = _random_words.slice();
    if (event.keyCode == 32 && i < random_words.length && started) {
        if (random_words[i].length != 0) {
            if (document.getElementById('typingArea').value.trim().localeCompare(random_words[i].trim()) == 0) {
                // console.log(++score);
                score++;
                let word = " <span style='color: #38b000;border-radius: 2px'>" + random_words[i] + "</span> ";
                random_words.splice(i, 1, word);
            } else {
                let word = " <span style='color: #e5383b;border-radius: 2px'>" + random_words[i] + "</span> ";
                random_words.splice(i, 1, word);
            }
        }
        document.getElementById('typingArea').value = "";
        if (k == wordCount - 1) {
            k = 0;
            l++;
            wordCount = LineWords[l];
            randomTxt.scrollBy(0, lineHeight); //// scroll end of line
        } else {
            k++;
        }
        i++;
        if (random_words[i] != undefined) {
            let word = " <span style='background-color: #FF859B;border-radius: 2px'>" + random_words[i] + "</span> ";
            random_words.splice(i, 1, word);
        }
        document.getElementById('randomTxt').innerHTML = random_words.join(' ');
    }
    if (!started && event.keyCode != 32) {
        time = 0;
        started = true;
        timer = setInterval(startTimer, 1000);
        var word = " <span style='background-color: #FF859B;border-radius: 2px'>" + random_words[0] + "</span> "; /// highlighting the first word
        random_words.splice(0, 1, word);
        document.getElementById('randomTxt').innerHTML = random_words.join(' ');
        wordCount = LineWords[l];
    }
    if (!started && event.keyCode == 32) {
        document.getElementById('typingArea').value = '';
    }
}

function startTimer() {
    document.getElementsByClassName('timeB')[0].innerHTML = ++time + ' (s)';
    if (i == random_words.length) {
        document.getElementById('randomTxt').innerHTML = _random_words.join(' ');
        clearInterval(timer);
        started = false;
        score = Math.round(score * 60 / time);
        ///////////////////////
        $.ajax({
            url: "/verifyScore",
            type: "POST",
            data: { score: score },
            success: function(data) {
                if (data.msg == 'username') {
                    document.getElementById('value').innerHTML = score + ' wpm';
                    document.getElementById('hiddenScore').value = score;
                    document.getElementById('updateValue').value = data.updateValue;
                    console.log('updateValue : ' + document.getElementById('updateValue').value);
                    let topTenForm = $('#topTenForm');
                    topTenForm.modal('show');
                }
                document.getElementById('result').innerHTML = "Congrats !!! <br><br> You scored : " + score;
                document.getElementById("scorePanel").style = "display :block;";
                randomTxt.scrollTo(0, 0);
                document.getElementById("scorePanel").scrollIntoView();
                resetTimer();
                score = 0;
                time = 0;
                i = 0;
                if (document.activeElement != document.body) document.activeElement.blur(); //// clear focus
            }
        });
        ///////////////////////
    }
}

function PauseContinue() {
    if (parseInt(document.getElementsByClassName('timeB')[0].innerHTML) != 60) {
        if (started) {
            clearInterval(timer);
            started = false;
            document.getElementById('typingArea').disabled = true;
            document.getElementsByClassName('timeB')[0].style.backgroundColor = "#FF859B";
        } else {
            timer = setInterval(startTimer, 1000);
            started = true;
            document.getElementById('typingArea').disabled = false;
            document.getElementsByClassName('timeB')[0].style.backgroundColor = "transparent";
        }
    }
}

function resetTimer() {
    clearInterval(timer);
    started = false;
    time = 0;
    score = 0;
    i = 0;
    document.getElementsByClassName('timeB')[0].innerHTML = "0 (s)";
    document.getElementById('typingArea').value = "";
}

function retryRandom() {
    document.getElementById("scorePanel").style = "display :none;";
    window.scrollTo(0, 0);
    document.getElementById('randomTxt').innerHTML = _random_words.join(' ');
    resetTimer();
}

function submitForm() {
    var username = $('#username').val();
    var hiddenScore = $('#hiddenScore').val();
    var updateValue = $('#updateValue').val();
    $.ajax({
        url: "/updateUser",
        type: "POST",
        data: { username: username, hiddenScore: hiddenScore, updateValue: updateValue },
        success: function(data) {
            console.log(data.msg);
        }
    });
}
/////////// evaluation process ////////////////

////////// post ///////////
function Post(articleId) {
    $(".emojionearea-editor").children().attr('src', '');
    let postContent = $(".emojionearea-editor").html();
    if (postContent != '') {
        postContent = HTMLTOTEXT.htmlToText(postContent);
        $.ajax({
            url: "/NewPost",
            type: "POST",
            data: { Article: articleId, Content: postContent },
            success: function(data) {
                $('.discussion').html(data.html);
            }
        });
        $(".emojionearea-editor").html('');
    }
}
////// post reply /////
function reply(postId, articleId) {
    $(".emojionearea-editor").children().attr('src', '');
    let replyContent = $(".emojionearea-editor").html();
    if (replyContent != '') {
        replyContent = HTMLTOTEXT.htmlToText(replyContent);
        $.ajax({
            url: "/reply",
            type: "POST",
            data: { Article: articleId, Post: postId, Content: replyContent },
            success: function(data) {
                $('.discussion').html(data.html);
            }
        });
        $(".emojionearea-editor").html('');
    }
}
////////////////////////
function wordWidth(word, font) {
    let ruler = document.getElementById("ruler");
    ruler.style.fontFamily = font;
    ruler.innerHTML = word;
    return ruler.offsetWidth;
}
///////////////////////
Echo.channel('posting')
    .listen('NewPost', (e) => {
        $('.discussion').html(e.msg);
    });
///////////////////////