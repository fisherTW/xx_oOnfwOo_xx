<link href='<?= base_url()?>assets/css/welcome.css' rel='stylesheet' type='text/css'/>
<link href='https://fonts.googleapis.com/css?family=Rubik:300' rel='stylesheet' type='text/css'>

<section class="container">
	<div id="cube" class="spinning">
		<figure class="front"><img src='http://placekitten.com/g/150/150'></figure>
		<figure class="back"><img src='http://placekitten.com/g/150/150'></figure>
		<figure class="right clock-word"><img src='http://placekitten.com/g/150/150'></figure>
		<figure class="left clock-word"><img src='http://placekitten.com/g/150/150'></figure>
		<figure class="top"><img src='http://placekitten.com/g/150/150'></figure>
		<figure class="bottom clock-word"><img src='http://placekitten.com/g/150/150'></figure>
	</div>
</section>

<script type="text/javascript">
function showTime() {
	var a_p = "";
	var today = new Date();
	var curr_hour = today.getHours();
	var curr_minute = today.getMinutes();
	var curr_second = today.getSeconds();
	if (curr_hour < 12) {
	    a_p = "<span>AM</span>";
	} else {
	    a_p = "<span>PM</span>";
	}
	if (curr_hour == 0) {
	    curr_hour = 12;
	}
	if (curr_hour > 12) {
	    curr_hour = curr_hour - 12;
	}
	curr_hour = checkTime(curr_hour);
	curr_minute = checkTime(curr_minute);
	curr_second = checkTime(curr_second);
	$('.left').html(curr_hour + '<span style="font-size: 24px">h</span>');
	$('.bottom').html(curr_minute + '<span style="font-size: 24px">m</span>');
	$('.right').html(curr_second + '<span style="font-size: 24px">s</span>');
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(showTime, 500);
</script>