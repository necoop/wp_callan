let arr = document.querySelectorAll(
  ".country__item, .study__form__item, .speciality__item"
);

let new_arr = document.querySelectorAll(
  ".new__country__item, .new__study__form__item, .new__speciality__item"
);

let filtresBtn = document.getElementById("filtres__mobile__btn");
let filtresBtnDisabled = true;
filtresBtn.addEventListener("touchstart", trySend);

function trySend() {
  if (!filtresBtnDisabled) {
    send();
  }
}

arr.forEach((element) => {
  element.addEventListener("click", wait);
});

new_arr.forEach((element) => {
  element.addEventListener("click", cooke_mobile);
});

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
  let new_choise = document.getElementsByClassName("new__country__item");
  let countries = [];
  for (let i = 0; i < choise.length; i++) {
    if (choise[i].checked) {
      countries[countries.length] = choise[i].id;
      new_choise[i].checked = "cheked";
    } else {
      new_choise[i].checked = "";
    }
  }
  document.cookie = "countries=" + countries + "; max-age=" + 60 * 60 * 24 * 30;

  // Сохраняем список выбранных форм обучения в куки сроком действия 30 дней
  choise = document.getElementsByClassName("study__form__item");
  new_choise = document.getElementsByClassName("new__study__form__item");
  let studyForm = [];
  for (let i = 0; i < choise.length; i++) {
    if (choise[i].checked) {
      studyForm[studyForm.length] = choise[i].id;
      new_choise[i].checked = "cheked";
    } else {
      new_choise[i].checked = "";
    }
  }
  document.cookie =
    "study_form=" + studyForm + "; max-age=" + 60 * 60 * 24 * 30;

  // Сохраняем список выбранных специальностей в куки сроком действия 30 дней
  choise = document.getElementsByClassName("speciality__item");
  new_choise = document.getElementsByClassName("new__speciality__item");
  let speciality = [];
  for (let i = 0; i < choise.length; i++) {
    if (choise[i].checked) {
      speciality[speciality.length] = choise[i].id;
      new_choise[i].checked = "cheked";
    } else {
      new_choise[i].checked = "";
    }
  }
  document.cookie =
    "speciality=" + speciality + "; max-age=" + 60 * 60 * 24 * 30;
}

// Отправляем форму по истечении времени
function send() {
  document.getElementById("universities__filtres").submit();
  console.log("Отправка!");
}
function counter() {
  timeToWait -= 1000;
  if (!timeToWait) {
    clearInterval(startCounter);
    counterExist = false;
    send();
  }
}

function cooke_mobile() {
  filtresBtnDisabled = false;
  filtresBtn.setAttribute('disabled', false);
  // Сохраняем список выбранных стран в куки сроком действия 30 дней в мобильном фильтре
  let new_choise = document.getElementsByClassName("new__country__item");
  let choise = document.getElementsByClassName("country__item");
  let countries = [];
  for (let i = 0; i < choise.length; i++) {
    if (new_choise[i].checked) {
      countries[countries.length] = new_choise[i].name;
      choise[i].checked = "checked";
    } else {
      choise[i].checked = "";
    }
  }
  document.cookie = "countries=" + countries + "; max-age=" + 60 * 60 * 24 * 30;

  // Сохраняем список выбранных форм обучения в куки сроком действия 30 дней в мобильном фильтре
  choise = document.getElementsByClassName("study__form__item");
  new_choise = document.getElementsByClassName("new__study__form__item");
  let studyForm = [];
  for (let i = 0; i < choise.length; i++) {
    if (new_choise[i].checked) {
      studyForm[studyForm.length] = new_choise[i].name;
      choise[i].checked = "cheked";
    } else {
      choise[i].checked = "";
    }
  }
  document.cookie =
    "study_form=" + studyForm + "; max-age=" + 60 * 60 * 24 * 30;

  // Сохраняем список выбранных специальностей в куки сроком действия 30 дней в мобильном фильтре
  choise = document.getElementsByClassName("speciality__item");
  new_choise = document.getElementsByClassName("new__speciality__item");
  let speciality = [];
  for (let i = 0; i < choise.length; i++) {
    if (new_choise[i].checked) {
      speciality[speciality.length] = new_choise[i].name;
      choise[i].checked = "cheked";
    } else {
      choise[i].checked = "";
    }
  }
  document.cookie =
    "speciality=" + speciality + "; max-age=" + 60 * 60 * 24 * 30;
}
