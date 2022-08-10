var slide_index_for_row_1 = 0;
var slide_index_for_row_2 = 0;
var slide_index_for_row_3 = 0;
var slide_index_for_row_4 = 0;
var slide_index_for_row_5 = 0;
var slide_index_for_row_6 = 0;
var slide_index_for_row_7 = 0;
var slide_index_for_row_8 = 0;

var element1 = document.getElementById("row_1");
var element2 = document.getElementById("row_2");
var element3 = document.getElementById("row_3");
var element4 = document.getElementById("row_4");
var element5 = document.getElementById("row_5");
var element6 = document.getElementById("row_6");
var element7 = document.getElementById("row_7");
var element8 = document.getElementById("row_8");

var btn_left_1 = document.getElementById("btn_left_1");
var btn_right_1 = document.getElementById("btn_right_1");
var btn_left_2 = document.getElementById("btn_left_2");
var btn_right_2 = document.getElementById("btn_right_2");
var btn_left_3 = document.getElementById("btn_left_3");
var btn_right_3 = document.getElementById("btn_right_3");
var btn_left_4 = document.getElementById("btn_left_4");
var btn_right_4 = document.getElementById("btn_right_4");
var btn_left_5 = document.getElementById("btn_left_5");
var btn_right_5 = document.getElementById("btn_right_5");
var btn_left_6 = document.getElementById("btn_left_6");
var btn_right_6 = document.getElementById("btn_right_6");
var btn_left_7 = document.getElementById("btn_left_7");
var btn_right_7 = document.getElementById("btn_right_7");
var btn_left_8 = document.getElementById("btn_left_8");
var btn_right_8 = document.getElementById("btn_right_8");

element1.style.left = `0.1px`;
element2.style.left = `0.1px`;
element3.style.left = `0.1px`;
element4.style.left = `0.1px`;
element5.style.left = `0.1px`;
element6.style.left = `0.1px`;
element7.style.left = `0.1px`;
element8.style.left = `0.1px`;

if (slide_index_for_row_1 == 0) {
  btn_left_1.style.display = "none";
}
if (slide_index_for_row_2 == 0) {
  btn_left_2.style.display = "none";
}
if (slide_index_for_row_3 == 0) {
  btn_left_3.style.display = "none";
}
if (slide_index_for_row_4 == 0) {
  btn_left_4.style.display = "none";
}
if (slide_index_for_row_5 == 0) {
  btn_left_5.style.display = "none";
}
if (slide_index_for_row_6 == 0) {
  btn_left_6.style.display = "none";
}
if (slide_index_for_row_7 == 0) {
  btn_left_7.style.display = "none";
}
if (slide_index_for_row_8 == 0) {
  btn_left_8.style.display = "none";
}

function slidesRight(e) {
  if (e == "btn_right_1") {
    if (slide_index_for_row_1 == -2528) {
      btn_right_1.style.display = "none";
    }

    slide_index_for_row_1 -= 1264;
    element1.style.left = `${slide_index_for_row_1}px`;
    btn_left_1.style.display = "flex";
  } else if (e == "btn_right_2") {
    slide_index_for_row_2 -= 1264;

    if (slide_index_for_row_2 == -1264) {
      btn_right_2.style.display = "none";
    }

    console.log(slide_index_for_row_2);
    element2.style.left = `${slide_index_for_row_2}px`;
    btn_left_2.style.display = "flex";
  } else if (e == "btn_right_3") {
    slide_index_for_row_3 -= 1264;

    if (slide_index_for_row_3 == -1264) {
      btn_right_3.style.display = "none";
    }

    element3.style.left = `${slide_index_for_row_3}px`;
    btn_left_3.style.display = "flex";
  } else if (e == "btn_right_4") {
    slide_index_for_row_4 -= 1264;

    if (slide_index_for_row_4 == -1264) {
      btn_right_4.style.display = "none";
    }

    element4.style.left = `${slide_index_for_row_4}px`;
    btn_left_4.style.display = "flex";
  } else if (e == "btn_right_5") {
    slide_index_for_row_5 -= 1264;
    if (slide_index_for_row_5 == -1264) {
      btn_right_5.style.display = "none";
    }
    element5.style.left = `${slide_index_for_row_5}px`;
    btn_left_5.style.display = "flex";
  } else if (e == "btn_right_6") {
    slide_index_for_row_6 -= 1264;
    if (slide_index_for_row_6 == -1264) {
      btn_right_6.style.display = "none";
    }
    element6.style.left = `${slide_index_for_row_6}px`;
    btn_left_6.style.display = "flex";
  } else if (e == "btn_right_7") {
    slide_index_for_row_7 -= 1264;

    if (slide_index_for_row_7 == -2528) {
      btn_right_7.style.display = "none";
    }
    element7.style.left = `${slide_index_for_row_7}px`;
    btn_left_7.style.display = "flex";
  } else if (e == "btn_right_8") {
    slide_index_for_row_8 -= 1264;

    if (slide_index_for_row_8 == -2528) {
      btn_right_8.style.display = "none";
    }
    element8.style.left = `${slide_index_for_row_8}px`;
    btn_left_8.style.display = "flex";
  }
}

function slidesLeft(e) {
  if (e == "btn_left_1") {
    slide_index_for_row_1 += 1264;

    if (slide_index_for_row_1 == 0) {
      btn_left_1.style.display = "none";
    }

    element1.style.left = `${slide_index_for_row_1}px`;
    btn_right_1.style.display = "flex";
  } else if (e == "btn_left_2") {
    slide_index_for_row_2 += 1264;

    if (slide_index_for_row_2 == 0) {
      btn_left_2.style.display = "none";
    }

    element2.style.left = `${slide_index_for_row_2}px`;
    btn_right_2.style.display = "flex";
  } else if (e == "btn_left_3") {
    slide_index_for_row_3 += 1264;
    if (slide_index_for_row_3 == 0) {
      btn_left_3.style.display = "none";
    }
    element3.style.left = `${slide_index_for_row_3}px`;
    btn_right_3.style.display = "flex";
  } else if (e == "btn_left_4") {
    slide_index_for_row_4 += 1264;

    if (slide_index_for_row_4 == 0) {
      btn_left_4.style.display = "none";
    }

    element4.style.left = `${slide_index_for_row_4}px`;
    btn_right_4.style.display = "flex";
  } else if (e == "btn_left_5") {
    slide_index_for_row_5 += 1264;
    if (slide_index_for_row_5 == 0) {
      btn_left_5.style.display = "none";
    }
    element5.style.left = `${slide_index_for_row_5}px`;
    btn_right_5.style.display = "flex";
  } else if (e == "btn_left_6") {
    slide_index_for_row_6 += 1264;
    if (slide_index_for_row_6 == 0) {
      btn_left_6.style.display = "none";
    }

    element6.style.left = `${slide_index_for_row_6}px`;
    btn_right_6.style.display = "flex";
  } else if (e == "btn_left_7") {
    slide_index_for_row_7 += 1264;

    if (slide_index_for_row_7 == 0) {
      btn_left_7.style.display = "none";
    }
    element7.style.left = `${slide_index_for_row_7}px`;
    btn_right_7.style.display = "flex";
  } else if (e == "btn_left_8") {
    slide_index_for_row_8 += 1264;

    if (slide_index_for_row_8 == 0) {
      btn_left_8.style.display = "none";
    }
    element8.style.left = `${slide_index_for_row_8}px`;
    btn_right_8.style.display = "flex";
  }
}

// js for Hamburger
var burger = document.getElementById("dropdown_slide");

burger.style.top = "-146px";
// burger.style.display = "none";
function openBurger() {
  if (burger.style.top === "-146px") {
    // burger.style.display = "block";
    burger.style.top = "0px";
  } else {
    // burger.style.display = "block";
    burger.style.top = "-146px";
  }
}
