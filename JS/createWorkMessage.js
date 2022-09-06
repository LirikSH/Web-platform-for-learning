let contentLesson = document.querySelector(".contentLesson")
let formSelect= document.querySelector(".formSelect")

function createWorkMessage () {
    contentLesson.insertAdjacentHTML("beforeEnd",
        "<div class=\"messageBlock\">"
        + "<div class=\"workStudent\">"
        + "<div class=\"titleMessageBlock\">"
        + "<h3>Автор: " + nameStudent + "</h3>"
        + "<h3>Email: " + emailStudent + "</h3>"
        + "</div>"
        + "<h3>Результаты теста: "+ pointTest+" баллов</h3>"
        + "<div"
        + "<h2>Задание:</h2>"
        + "<p>" + kursTask + "</p>"
        + "</div>"
        + "<h2>Комментарий к работе:</h2>"
        + "<p>" + commentStudent + "</p>"
        + "<a class=\"download\" download>Скачать работу</a>"
        + "<div>"
        + "</div>"
    )
}

function createOption () {
    formSelect.insertAdjacentHTML("beforeEnd",
        "<option>Email: " + emailStudent +"</option>")
}