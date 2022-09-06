let courseCards = document.querySelector(".courseCards")

function createCard () {
    courseCards.insertAdjacentHTML("beforeEnd",
        "<div class=\"courseCard\">"
        + "<div class=\"imageCourseCard\"></div>"
        + "<div class=\"courseCardInf\">"
        + "<h2>" + title + "</h2>"
        + "<p>" + description + "</p>"
        + "</div>"
        + "<img src=\"../../Media/lock.png\" class=\"lockImage invisible\">"
        + "<button class=\"courseCardButton\" onclick=curseButton()>Смотреть</button>"
        + "<div>")
}

