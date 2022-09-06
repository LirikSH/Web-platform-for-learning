let buttonCard = document.querySelectorAll(".courseCardButton")
let lockImage = document.querySelectorAll(".lockImage")

function lockCard () {
    if (lockStatus === "lock") {
        buttonCard[point].classList.add("lockButton")
        buttonCard[point].setAttribute("disabled", true);
        lockImage[point].classList.remove("invisible")
    }
    }


