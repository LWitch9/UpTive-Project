const search = document.querySelector('input[placeholder="search people"]');
const peopleContainer = document.querySelector(".people-container");


search.addEventListener("keyup", function(event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchBar",{
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response){
            return response.json();
        }).then(function(people){
            console.log("Hi Maja");
            peopleContainer.innerHTML = "";
            loadPeople(people);
        })
    }
});



function loadPeople(people) {
    people.forEach(person =>{
        console.log(person);
        createPerson(person);
    })
}
function createPerson(person) {
    const template = document.querySelector("#people-template");

    const clone = template.content.cloneNode(true);

        const avatar = clone.querySelector("img");
        avatar.src = `/public/img/avatars/${person.avatar}.jpg`;

        const email = clone.querySelector("#email");
        email.innerHTML.value = person.email;

        const nameSurname = clone.querySelector("h");
        nameSurname.innerHTML = person.name+" "+person.surname;

    peopleContainer.appendChild(clone);
}