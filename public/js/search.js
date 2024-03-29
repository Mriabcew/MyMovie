const search = document.querySelector('input[placeholder="search movie"]');
const movieContainer= document.querySelector(".movies");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (movies) {
            movieContainer.innerHTML = "";
            loadProjects(movies)
        });
    }
});

function loadProjects(movies) {
    movies.forEach(movie => {
        console.log(movie);
        createProject(movie);
    });
}

function createProject(movie) {
    const template = document.querySelector("#movie-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = movie.id;
    const image = clone.querySelector("img");
    image.src = `/public/img/uploads/${movie.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = movie.title;
    const description = clone.querySelector("p");
    description.innerHTML = movie.description;
    const like = clone.querySelector(".fa-heart");
    like.innerText = " " + movie.likes
    const dislike = clone.querySelector(".fa-minus-square");
    dislike.innerText = " " + movie.dislikes;

    div.onclick=() => {window.location=`movie/${movie.id}`;};

    movieContainer.appendChild(clone);
}
