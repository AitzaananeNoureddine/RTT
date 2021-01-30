@extends('partial/master')
@section('content')
    <div class="content" style="background-color: #CFC9C9;text-align: center">
        <h2 style="color: #230052;font-family: 'Londrina Solid', cursive;">Random typing test</h2><br>
        <div contenteditable="false" id="randomTxt" class="form-control">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id turpis at ex faucibus lacinia ut eu libero. Sed maximus nec erat nec ornare. Donec congue diam venenatis, finibus purus commodo, molestie arcu. Etiam iaculis nisl nec mollis facilisis. Nunc suscipit iaculis ligula sed blandit. Praesent at libero ipsum. Phasellus eget magna at dolor ultricies commodo id eu enim. Praesent auctor, elit eu vehicula interdum, est ante euismod lacus, quis tempus risus mauris nec sapien. Vestibulum a eros congue, hendrerit dui sed, ullamcorper sapien. Quisque et hendrerit neque. Phasellus vel lectus id sapien tincidunt faucibus. Donec ac tristique mi, in maximus erat.

            Sed id libero tortor. Fusce volutpat, elit ut placerat ullamcorper, diam turpis imperdiet neque, semper facilisis eros nunc at orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam quam metus, finibus et fringilla ut, placerat eget magna. Nam efficitur ante ac aliquam tincidunt. Aenean tempor euismod porttitor. Donec risus leo, eleifend condimentum arcu et, dapibus rhoncus risus. Suspendisse potenti. Fusce a sodales odio, quis egestas felis. Praesent volutpat eleifend aliquam. Duis non lacus elit.

            Nam porttitor purus at sapien efficitur tincidunt at ac urna. Nullam venenatis ipsum arcu, eget ultrices ex venenatis sed. Aliquam et scelerisque nisi, vel porttitor felis. In viverra nisi ligula, at tincidunt orci vulputate sed. Etiam et felis in mi mattis facilisis nec ut felis. Donec volutpat laoreet justo nec suscipit. Sed eget sodales risus, sed convallis lectus. Quisque facilisis dolor ac tincidunt scelerisque. Aenean elit ipsum, vestibulum sed mi ut, pulvinar suscipit purus. Nunc faucibus purus sollicitudin imperdiet convallis. Nullam accumsan sagittis ante commodo dapibus.

            Vivamus a elementum diam. In vulputate viverra turpis sit amet accumsan. Ut nec enim enim. Fusce elementum semper libero fermentum placerat. Donec vestibulum placerat tellus ut pellentesque. Ut turpis tortor, tincidunt non. 
        </div><br>
        <textarea name="" id="typingArea" rows="1" class="form-control" style="resize: none;" placeholder="start typing..." onkeypress="start(event);"></textarea><br><br>
        <button class="resetB" onclick="retryRandom()"><strong>Reset</strong></button>
        <button class="timeB" onclick="PauseContinue()">60</button><br><br><br><br><br>
        <div id="scorePanel">
            <img src="assets/images/score_img.png" width="20%">
            <h3 id="result">Result</h3><br><br>
            <button onclick="retryRandom()"><strong>Retry</strong></button>
        </div>
    </div>
@endsection