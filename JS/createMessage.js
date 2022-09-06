let contentLesson = document.querySelector("#contentLesson")

function createMessage () {
    contentLesson.insertAdjacentHTML("afterend",
        "<div class=\"messageBlock\">"
        + "<div class=\"workStudent\">"
        + "<h2>Тема обращения: «" + themeTask +"»</h2><br/>"
        + "<label>Ответ:</label>"
        + "<p>" + commentTask + "</p>"
        + "</div>"
        + "</div>"
    )
}