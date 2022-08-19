function searchPosts(event) {
  let list = document.querySelectorAll("#element");
  let searchInput = document.querySelector("#search");
  let search = searchInput.value.toLowerCase();

  if (search != "") {
    document.querySelector("#search-append").classList.remove("hide");
  } else {
    document.querySelector("#search-append").classList.add("hide");
    document.querySelector("#search").classList.remove("filled");
  }
  list.forEach((element) => {
    if (search === "") element.classList.remove(["hide"]);
    else {
      const title = element.querySelector("#title").innerHTML.toLowerCase();
      const excerpt = element
        .querySelector("#excerpt p")
        .innerHTML.toLowerCase();
      if (title.includes(search) || excerpt.includes(search))
        element.classList.remove(["hide"]);
      else element.classList.add(["hide"]);
    }
  });
}

function cleanSearch() {
  document.querySelector("#search").value = "";
  document.querySelector("#search-append").classList.add(["hide"]);
  document.querySelector("#search").classList.remove("filled");
  document.querySelectorAll("#element").forEach((element) => {
    element.classList.remove(["hide"]);
  });
}

function searchFocusOut() {
  document.querySelector("#search").classList.add("filled");
}
