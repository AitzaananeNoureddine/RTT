$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
if (document.getElementById('randomTxt') != null) {
    var _random_words = document.getElementById('randomTxt').textContent.trim();
    var _random_words = _random_words.split(' ');
}
var score = 0;
var random_words;

function start(event) {
    document.getElementById("scorePanel").style = "display :none;";
    random_words = _random_words.slice();
    if (event.keyCode == 32 && i < random_words.length && started) {
        if (document.getElementById('typingArea').value.trim().localeCompare(random_words[i].trim()) == 0) {
            console.log(++score);
            // score++;
        }
        document.getElementById('typingArea').value = "";
        i++;
        if (random_words[i] != undefined) {
            var word = " <span style='background-color: #FF859B;border-radius: 2px'>" + random_words[i] + "</span> ";
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
        document.getElementById("scorePanel").style = "display :block;";
        document.getElementById("scorePanel").scrollIntoView();
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
                    $('#topTenForm').modal('show');
                }
                document.getElementById('result').innerHTML = "Congrats !!! <br><br> You scored : " + score + " wpm";
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

/////////// post form slider ////////////////
$(".buttonNfield a").click(function() {
    $(".buttonNfield .form").toggleClass('showAddPost');

});
/////////// post form slider ////////////////
function Post(articleId) {
    let postContent = $("#postContent").val();
    $("#postContent").val('');
    $.ajax({
        url: "/NewPost",
        type: "POST",
        data: { Article: articleId, Content: postContent },
        success: function(data) {
            $('.discussion').html(data.html);
        }
    });
}
////// post reply /////
function reply(postId, articleId) {
    let replyContent = $("#postContent").val();
    if (replyContent != '') {
        $("#postContent").val('');
        $.ajax({
            url: "/reply",
            type: "POST",
            data: { Article: articleId, Post: postId, Content: replyContent },
            success: function(data) {
                $('.discussion').html(data.html);
            }
        });
    }
}