const search = document.querySelector(".search");
const eventContainer = document.querySelector("#events_container");

search.addEventListener("keyup", function(event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function(events){
            eventContainer.innerHTML = "";
            loadEvents(events);
            }
        );
    }
});

function loadEvents(events){
    events.forEach(event=>{
        console.log(event);
        createEvent(event);
    });
    interested();
}

function createEvent(event){
    const template = document.querySelector("#event_template");

    const clone = template.content.cloneNode(true);


    const event_cont = clone.querySelector(".event");
    const onclick = `location.href='event?id=${event.eventID}'`;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${event.event_picture}`;
    const title = clone.querySelector("h2");
    title.innerHTML = event.event_name;
    title.setAttribute('onclick', onclick);
    const description = clone.querySelector(".description");
    description.innerHTML = event.description;
    const location = clone.querySelector(".location");
    location.innerHTML = event.location_name;
    const date = clone.querySelector(".date");
    date.innerHTML = event.event_date;

    const interest_button = clone.querySelector(".interest_button")
    if(event.interested_userID != null){
        interest_button.classList.add("interested");
    }else{
        interest_button.classList.add("uninterested");
    }
    eventContainer.appendChild(clone);
    }


