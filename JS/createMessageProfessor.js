let contentLesson = document.querySelector(".contentLesson")
let formSelect= document.querySelector(".formSelect")

function createMessageProfessor () {
    contentLesson.insertAdjacentHTML("beforeend",
        "<div class=\"messageBlock\">"
        + "<div class=\"workStudent\">"
        + "<div class=\"titleMessageBlock\">"
        + "<h3>Автор: " + namePerson + "</h3>"
        + "<h3>Email: " + emailPerson + "</h3>"
        + "</div>"
        + "<div class=\"titleMessageBlock\">"
        + "<h2>Тема обращения: «" + themeTask +"»</h2>"
        + "<h3>"+ ariaTask +"</h3>"
        + "</div>"
        + "<p>" + textStudent + "</p>"
        + "<a class=\"download\" download>Скачать работу</a>"
        + "</div>"
        + "</div>"
    )
}

function createOption () {
    formSelect.insertAdjacentHTML("beforeEnd",
        "<option>Email: " + emailPerson +"</option>")
}