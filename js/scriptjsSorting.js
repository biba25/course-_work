let filters = document.querySelectorAll("a[data-filter]"); // получаем ссылки с атрибктом data-filter

for (let filter of filters) {
  filter.addEventListener("click", function (e) {
    e.preventDefault(); // изменяет значение по умолчанию у ссылок

    let catId = filter.getAttribute("data-filter"); // получаем значение атрибута data-filter
    let workCat = document.querySelectorAll(".portfolio__col");

    workCat.forEach(function (c) {
      // функция с добавлением и удалением класса
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
