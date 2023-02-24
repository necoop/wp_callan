let calendar = document.getElementsByClassName("calendar");
for(let i = 0; i < calendar.length; i++){
    calendar[i].addEventListener('change', calendarColor);
}
function calendarColor() {
  for(let i = 0; i < calendar.length; i++){
    if (!calendar[i].classList.contains("date-input--has-value" && calendar[i].value != null)) {
        calendar[i].classList.add('date-input--has-value')};
        if (calendar[i].value == '') {
          calendar[i].classList.remove('date-input--has-value')};
  }
};