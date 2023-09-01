`use strict`;
// Header
// (clicking on Search butten)
const showHideSearch = function () {
  let input_Search = (document.getElementById("input-search").value = "");
  document.querySelector(".header-search-box").classList.remove("hidden");
  document.querySelector(".header-search-box").classList.remove("fade-out");

  document
    .querySelector(".header-search-close-icon")
    .classList.remove("fade-out");
  document
    .querySelector(".header-search-close-icon")
    .classList.remove("hidden");
  document.querySelector(".header-search-close-icon").classList.add("fade-in");
  document.querySelector(".header-search-box").classList.add("fade-in");
};
// (clicking on close of searchbar)

const backToMain = function () {
  dropdownShown = false;
  allowWindowClickToExecuteBackToMain = false;
  document.querySelector(".header-search-box").classList.remove("fade-in");
  document
    .querySelector(".header-search-close-icon")
    .classList.remove("fade-in");
  document.querySelector(".header-search-close-icon").classList.add("fade-out");
  document.querySelector(".header-search-box").classList.add("fade-out");
  setTimeout(setBack, 450);
  function setBack() {
    document.querySelector(".header-search-close-icon").classList.add("hidden");
    document.querySelector(".header-search-box").classList.add("hidden");
  }
};

// (Visibiling dropDown)
const showDropDown = function () {
  dropdownShown = true;
  document.querySelector(".drop-box-container").classList.remove("fade-out");
  document
    .querySelector(".drop-box-visible")
    .classList.remove("drop-box-visible");
  document.querySelector(".drop-box-container").classList.add("fade-in");
};

// (Dropdown li click)
$("dropdownSearchBox li").on("click", function (e) {
  alert(text);
  e.stopPropagation();
  var text = $(this).contents()[0].nodeValue.trim();
  alert(text);
});

function dropDownSearchItemClick(args) {
  if (dropdownShown === true) {
    allowWindowClickToExecuteBackToMain = false;
  }
  var text = $(args).contents()[0].nodeValue.trim();
  document.getElementById("input-search").value = text;
  document.querySelector(".drop-box-container").classList.add("fade-out");
  setTimeout(setBack, 450);
  function setBack() {
    document
      .querySelector(".drop-box-container")
      .classList.add("drop-box-visible");
  }
}

// (make the dropDown disappear by clicking anywhere on the page))
// (See the showDropDown and backMain the true and false parameters))
let dropdownShown = false;
let allowWindowClickToExecuteBackToMain = false;
window.onclick = function (event) {
  if (allowWindowClickToExecuteBackToMain) {
    backToMain();
  }
  if (dropdownShown === true) {
    allowWindowClickToExecuteBackToMain = true;
  }
};

/*// Binding Header to all pages
// window.addEventListener("load", function(){
document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".header");
  fetch("/header.php")
    .then((res) => res.text())
    .then((data) => {
      nav.innerHTML = data;
      const parser = new DOMParser();
      const doc = parser.parseFromString(data, "text/php");
      eval(document.querySelector("script").textContent);
    });
});
// Binding Footer to all pages
// Window.addEventListener("load", function(){
document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".footer");
  fetch("/footer.php")
    .then((res) => res.text())
    .then((data) => {
      nav.innerHTML = data;
      const parser = new DOMParser();
      const doc = parser.parseFromString(data, "text/php");
      eval(document.querySelector("script").textContent);
    });
});*/

// Binding coockie to all pages
// Window.addEventListener("load", function(){
document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".coockie-main");
  fetch("/coockie.php")
    .then((res) => res.text())
    .then((data) => {
      nav.innerHTML = data;
      const parser = new DOMParser();
      const doc = parser.parseFromString(data, "text/php");
      eval(document.querySelector("script").textContent);
    });
});

// Prevent the browser from showing default error bubble
document.addEventListener(
  "invalid",
  (function () {
    return function (e) {
      // prevent the browser from showing default error bubble / hint
      e.preventDefault();
    };
  })(),
  true
);

// login
// varibles
let loginEmailInput = document.querySelector(".input-email");
let loginPasswordInput = document.querySelector(".input-pass");

// invalidEmailMessage
function invalidEmailMessage(textBox) {
  textBox.addEventListener("click", function () {
    loginEmailInput.classList.remove("invalidInput");
  });
  let text = textBox.value;
  if (textBox.value === "") {
    textBox.classList.add("invalidInput");
    return false;
  } else if (textBox.validity.typeMismatch) {
    textBox.classList.add("invalidInput");
    return false;
  }
  textBox.classList.remove("invalidInput");
  return true;
}

// invalidPasswordMessage
function invalidPasswordMessage(textBox) {
  textBox.addEventListener("click", function () {
    textBox.classList.remove("invalidInput");
  });
  if (textBox.value === "") {
    textBox.classList.add("invalidInput");
    return false;
  }
  textBox.classList.remove("invalidInput");
  return true;
}

function invalidPasswordsMessage(textBox1Id, textBox2Id) {
  var textBox1 = document.getElementById(textBox1Id);
  var textBox2 = document.getElementById(textBox2Id);
  textBox1.addEventListener("click", function () {
    textBox1.classList.remove("invalidInput");
  });
  textBox2.addEventListener("click", function () {
    textBox2.classList.remove("invalidInput");
  });
  if (textBox1.value !== textBox2.value) {
    textBox1.classList.add("invalidInput");
    textBox2.classList.add("invalidInput");
    return false;
  }
  textBox1.classList.remove("invalidInput");
  textBox2.classList.remove("invalidInput");
  return true;
}

// Reseting the text input function
// invalidVorname&nachname
const regVorname = document.querySelector(".input-vorname");
const regNachname = document.querySelector(".input-nachname");
const regCheckboxes = document.querySelectorAll(".checkbox");
function invalidVorNameMessage(textBox) {
  textBox.addEventListener("click", function () {
    textBox.classList.remove("invalidInput");
  });
  if (textBox.value === "") {
    textBox.classList.add("invalidInput");
    return false;
  }
  textBox.classList.remove("invalidInput");
  return true;
}

function invalidNachNameMessage(textBox) {
  return invalidVorNameMessage(textBox);
}

function invalidMessage(textBox) {
  return invalidVorNameMessage(textBox);
}

function invalidCheckBox(checkBox, layerId) {
  var checkBoxLayer = document.getElementById(layerId);
  checkBox.addEventListener("click", function () {
    checkBoxLayer.style.backgroundColor = "transparent";
  });
  if (checkBox.checked) {
    checkBoxLayer.style.backgroundColor = "transparent";
    return true;
  }
  checkBoxLayer.style.backgroundColor = "red";
  return false;
}

// (coockie)
// See the Coockie binding code up (using fetch)
const LBLCookiesAccepted = "LBLCookiesAccepted";
const OnlyTechnicalCoockiesAllowed = "OnlyTechnicalCoockiesAllowed";
const AllCookiesAllowed = "AllCookiesAllowed";
function acceptTechnicalCoockie() {
  let coockieModal = document.querySelector(".Coockie-consent-modal");
  coockieModal.classList.remove("fade-in");
  coockieModal.classList.add("fade-out");
  setTimeout(function () {
    coockieModal.classList.remove("coockie-actieve");
    localStorage.setItem(LBLCookiesAccepted, OnlyTechnicalCoockiesAllowed);
  }, 450);
}

function acceptCookie() {
  let coockieModal = document.querySelector(".Coockie-consent-modal");
  coockieModal.classList.remove("fade-in");
  coockieModal.classList.add("fade-out");
  setTimeout(function () {
    coockieModal.classList.remove("coockie-actieve");
    localStorage.setItem(LBLCookiesAccepted, AllCookiesAllowed);
  }, 450);
}

setTimeout(function () {
  let coockieModal = document.querySelector(".Coockie-consent-modal");
  let coockieAccepted = localStorage.getItem(LBLCookiesAccepted);
  if (
    coockieAccepted != "AllCookiesAllowed" &&
    coockieAccepted != "OnlyTechnicalCoockiesAllowed"
  ) {
    coockieModal.classList.add("coockie-actieve");
  }
  coockieModal.classList.add("fade-in");
}, 1500);

//Account Date Change
let inputCalender = document.querySelector(".input-calendar");

function accountCalendarReset() {
  inputCalender.addEventListener("click", function () {
    inputCalender.removeAttribute("readonly");
  });
}

function accountCalendar() {
  inputCalender.addEventListener("keydown", function () {
    inputCalender.setAttribute("readonly", "");
  });
}

// Link as button for account page upload image
/*$(function () {
  $("#account-edit-img-link").on("click", function (e) {
    e.preventDefault();
    $("#account-input-file:hidden").trigger("click");
  });
});

// Setting image in image tag before uploading
let inputFile = document.getElementById("account-input-File");
let accountImage = document.getElementById("profile-pic");
inputFile.onchange = function (e) {
  if (0 < e.target.files.length) {
    src = URL.createObjectURL(e.target.files[0]);
    accountImage.src = src;
  }
};
*/
const inputFile = document.getElementById("account-input-File");
let accountImage = document.getElementById("profile-pic");
let img = document.querySelector("img");

inputFile.addEventListener("change", () => {
  alert("Hi Masoud");
  let reader = new FileReader();
  reader.readAsDataURL(inputFile.files[0]);
  reader.addEventListener("load", () => {
    accountImage.innerHTML = `<img src = ${reader.result} alt=''/>`;
  });
});
