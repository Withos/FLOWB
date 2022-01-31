function interested(){
    let events = document.getElementsByClassName("event");

    for (let i = 0; i < events.length; i++) {
        let eventhref = events[i].querySelector("h2").getAttribute("onclick");
        let eventid = eventhref.replace('location.href=\'event?id=', '').slice(0, -1);
        events[i].querySelector(".interest_button").addEventListener('click', function (event) {
            event.preventDefault();
            if (this.classList.contains("interested")) {
                this.classList.add("uninterested");
                this.classList.remove("interested");
                fetch('/uninterested', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    body: `id=${eventid}`,
                })
            } else {
                this.classList.remove("uninterested");
                this.classList.add("interested");
                fetch('/interested', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                    },
                    body: `id=${eventid}`,
                });
            }
        })
    }
}

interested();




