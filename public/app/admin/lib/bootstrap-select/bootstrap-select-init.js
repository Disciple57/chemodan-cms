function selectpickerInit() {

    function run() {
        $('.selectpicker').selectpicker();
    }

    let timerId = setInterval(() => run(), 10);
    setTimeout(() => {
        clearInterval(timerId);
    }, 10);
}