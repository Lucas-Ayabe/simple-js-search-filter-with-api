function renderExercise(target, exercise) {
  const template = document.querySelector("#template > *").cloneNode(true);
  const [title, exerciseName] = template.querySelectorAll("p");
  title.innerHTML = "Exercise";
  exerciseName.innerHTML = exercise.name;

  target.appendChild(template);
}

const panel = document.querySelector(".panel #exercises");
const searchForm = document.querySelector("form");
const searchInput = document.querySelector("input");

searchForm.addEventListener("submit", (event) => {
  event.preventDefault();

  fetch("http://localhost:8080/api", {
    method: "POST",
    body: new URLSearchParams({ search: searchInput.value }),
  })
    .then((response) => response.json())
    .then((result) => {
      panel.innerHTML = "";
      result.data.forEach((exercise) => renderExercise(panel, exercise));
    })
    .catch(console.log);
});
