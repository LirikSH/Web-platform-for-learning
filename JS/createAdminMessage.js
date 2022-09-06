let contentLesson = document.querySelector(".contentLesson")
let formSelect= document.querySelector(".formSelect")

function createAdminMessage () {
    contentLesson.insertAdjacentHTML("beforeend",
        "<div class=\"messageBlock\">"
        + "<div class=\"workStudent\">"
        + "<div class=\"titleMessageBlock\">"
        + "<h3>Автор: " + nameStudent + "</h3>"
        + "<h3>Email: " + emailStudent + "</h3>"
        + "</div>"
        + "<div"
        + "<h2>Тема:</h2>"
        + "<p>" + kursTheme + "</p>"
        + "</div>"
        + "<h2>Комментарий к обращению:</h2>"
        + "<p>" + commentStudent + "</p>"
        + "<a class=\"download\" download>Скачать вложенный файл</a>"
        + "<div>"
        + "</div>"
    )
}

function createOption () {
    formSelect.insertAdjacentHTML("beforeEnd",
        "<option>Email: " + emailStudent +"</option>")
}