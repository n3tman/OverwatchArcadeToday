$(function() {
    function setTimerTime() {
        var timeLeft = moment(end.diff(moment.utc())).utc();
        var formatted = timeLeft.format('HH:mm:ss');
        $timer.text(formatted);
    }

    var end = moment.utc().endOf('day');
    var $timer = $('.timer');

    setTimerTime();

    setInterval(function () {
        setTimerTime();
    }, 1000);
});
