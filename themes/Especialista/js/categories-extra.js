let params = window.location.pathname.split("/");
params.splice(0, 1);
params.splice(params.length - 1);
let options = document.querySelectorAll("ul li a");
switch (params[2]) {
  case "ranking":
    options[1].classList.add("active");
    break;
  case "formacion":
    options[2].classList.add("active");
    break;
  case "novedades":
    options[3].classList.add("active");
    break;
  case "eventos":
    options[4].classList.add("active");
    break;
  case "retos":
    options[5].classList.add("active");
    break;
  default:
    options[0].classList.add("active");
    break;
}

//order selection
const queryParams = new URLSearchParams(window.location.search);
document.querySelector("#orderSelect").value = queryParams.get("order")
  ? queryParams.get("order")
  : "recent";

//fix on list element post category style
const postCategory = document.querySelectorAll("span .color-74 a");
postCategory.forEach((element) => {
  if (
    element.innerHTML.includes("Sin categor") ||
    element.innerHTML.includes("TODOS")
  )
    element.classList.add("hide");
  element.classList.add("color-74", "bolder", "font-11", "mb-0", "lh-1");
  element.classList.add("lh-1");
  element.classList.add("span-articles");
  element.classList.add("categories");
});

const excerpts = document.querySelectorAll(".font-16 p");
excerpts.forEach((excerpt) => {
  excerpt.classList.add("font-16");
});
