let comments = []; //
loadComments();

document.getElementById("comment-add").onclick = function () {
  //добаляем событие на кнопку, достаем комментарии из формы
  let commentName = document.getElementById("comment-name"); // получаем весь обьект
  let commentBody = document.getElementById("comment-body");

  let comment = {
    // получаем значение из самой формы
    name: commentName.value,
    body: commentBody.value,
    time: Math.floor(Date.now() / 1000), // текущее время комментария с округлением
  };

  commentName.value = ""; // очищаем форму
  commentBody.value = "";

  comments.push(comment); // добавляем comment  в массив comments
  saveComments(); // запуск функции сохранения
  showComments(); // запуск функции отображения на странице
};

function saveComments() {
  localStorage.setItem("comments", JSON.stringify(comments)); // сохраняям комментарии в localStorage
}
function loadComments() {
  // сохраняям комментарии на странице
  if (localStorage.getItem("comments"))
    comments = JSON.parse(localStorage.getItem("comments"));
  showComments();
}

function showComments() {
  // выводим на экран
  let commentField = document.getElementById("comment-field"); // будет отображаться в этом поле
  let out = "";
  comments.forEach(function (item) {
    // перебираем масив
    out += `<p class="text-right small"><em>${timeConverter(
      // время
      item.time
    )}</em></p>`;
    out += `<p class="alert alert-primary" role="alert">${item.name}</p>`; // имя
    out += `<p class="alert alert-success" role="alert">${item.body}</p>`; // комментарий
  });
  commentField.innerHTML = out;
}

function timeConverter(UNIX_timestamp) {
  // функция даты
  var a = new Date(UNIX_timestamp * 1000);
  var months = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  let year = a.getFullYear();
  let month = months[a.getMonth()];
  let date = a.getDate();
  let hour = a.getHours();
  let min = a.getMinutes();
  let sec = a.getSeconds();
  let time =
    date + " " + month + " " + year + " " + hour + ":" + min + ":" + sec;
  return time;
}
