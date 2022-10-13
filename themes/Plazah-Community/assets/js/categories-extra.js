//order selection
const queryParams = new URLSearchParams(window.location.search);
document.querySelector("#orderSelect").value = queryParams.get("order")
  ? queryParams.get("order")
  : "recent";
