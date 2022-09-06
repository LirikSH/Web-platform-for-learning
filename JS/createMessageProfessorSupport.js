function createMessageProfessorSupport () {
    contentLesson.insertAdjacentHTML("beforeend",
        "<div class=\"messageBlock\">"
        + "<div class=\"workStudent\">"
        + "<div class=\"titleMessageBlock\">"
        + "<h3>От кого: " + answerName + "</h3>"
        + "</div>"
        + "<div class=\"titleMessageBlock\">"
        + "<h2>Тема обращения: «" + answerTask +"»</h2>"
        + "<h3>"+ answerAria +"</h3>"
        + "</div>"
        + "<p>" + answerText + "</p>"
        + "</div>"
        + "</div>"
    )
}