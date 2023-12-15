function showTime() {
    var date = new Date();

    var current = date.toLocaleTimeString('en-US', { timeZone: 'Asia/Jakarta' });

    $('#time').html(current);
}

setInterval(showTime, 1000);