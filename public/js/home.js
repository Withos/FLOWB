function home() {
    if (screen.width / screen.height > 5 / 6) {
        location.href = "/events";
    }
}
home();
window.onresize = function (){
    home();
}