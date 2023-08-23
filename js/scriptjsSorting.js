let filters = document.querySelectorAll("div[data-filter]");

for (let filter of filters) {
  filter.addEventListener("click", function (e) {
    e.preventDefault();

    let catId = filter.getAttribute("data-filter");
    let workCat = document.querySelectorAll(".block");

    workCat.forEach(function (c) {
      if (catId === "all") {
        c.classList.remove("hide");
      } else {
        if (c.getAttribute("data-cat") !== catId) {
          c.classList.add("hide");
        } else {
          c.classList.remove("hide");
        }
      }
    });
  }); /* end listener*/
}
