const ebutton = document.getElementById("editButton");
const ewindow = document.querySelector(".edit_window");
const ecbutton = document.getElementById("close_edit_button")
if (ebutton != null) {
    ebutton.addEventListener('click', () => {
        ewindow.style.visibility = "visible";
    })
}

ecbutton.addEventListener("click", () =>{
    ewindow.style.visibility = "hidden";
})