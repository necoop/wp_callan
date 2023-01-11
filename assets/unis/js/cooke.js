let arr = document.querySelectorAll(
  ".country__item, .study__form__item, .speciality__item"
);

arr.forEach((element) => {
  element.addEventListener("click", wait);
});


// if(load == false){
//   document.addEventListener("DOMContentLoaded", send);
//   document.cookie = ('site_opened = true');
// }


// Время ожидания выбора пользователя
let timeToWait = 5000;

let counterExist = false;
let startCounter;

// Устанавливаем время ожидания
function wait(event) {
  if (!counterExist) {
    startCounter = setInterval(counter, 1000);
  } else {
    timeToWait = 5000;
  }
  counterExist = true;

  // Сохраняем список выбранных стран в куки сроком действия 30 дней
  let choise = document.getElementsByClassName("country__item");
  let countries = [];
  for (let i = 0; i < choise.length; i++) {
    if (choise[i].checked) {
      countries[countries.length] = choise[i].id;
    }
  }
  document.cookie = "countries=" + countries + "; max-age=" + 60 * 60 * 24 * 30;

  // Сохраняем список выбранных форм обучения в куки сроком действия 30 дней
  choise = document.getElementsByClassName("study__form__item");
  let studyForm = [];
  for (let i = 0; i < choise.length; i++) {
    if (choise[i].checked) {
      studyForm[studyForm.length] = choise[i].id;
    }
  }
  document.cookie =
    "study_form=" + studyForm + "; max-age=" + 60 * 60 * 24 * 30;

  // Сохраняем список выбранных специальностей в куки сроком действия 30 дней
  choise = document.getElementsByClassName("speciality__item");
  let speciality = [];
  for (let i = 0; i < choise.length; i++) {
    if (choise[i].checked) {
      speciality[speciality.length] = choise[i].id;
    }
  }
  document.cookie =
    "speciality=" + speciality + "; max-age=" + 60 * 60 * 24 * 30;
}

// Отправляем форму по истечении времени
function send() {
  document.getElementById("universities__filtres").submit();
}
function counter() {
  timeToWait -= 1000;
  if (!timeToWait) {
    clearInterval(startCounter);
    counterExist = false;
    send();
  }
}
