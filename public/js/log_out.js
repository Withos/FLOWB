const log_out_button = document.querySelector(".settings_button");

log_out_button.addEventListener('click', function(event){
    event.preventDefault();
    let request = new XMLHttpRequest();
    request.open("POST", "/logOut", true);
    request.send();
    document.location.href = "/login";
})