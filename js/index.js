var slideCount = 0;
var slideInfo = [{
        miniText: "Welcome to the",
        subMini: "Wits Division of",
        boldTitle: "Biomedical  Informatics",
        mainText: "A multifaceted team of doctors,  scientists,<br/>developers and researchers  dedicated to<br/>improving health care through technology<br/>and research."
    },
    {
        miniText: "Biomedical  Informatics ",
        subMini: "Clinical Informatics",
        boldTitle: "Electronic Discharge",
        mainText: "The team  has development electronic<br/>health care systems for the Wits affiliated<br/>hospitals, Charlotte Maxate, Helen Joseph<br/>and Baragwanath."
    },
    {
        miniText: "Biomedical  Informatics ",
        subMini: "Research Informatics",
        boldTitle: "REDCap",
        mainText: "The faculty hosts a web-based research  data<br/>management tool called RedCap, which is quicker<br/>and more secure than paper-based or Excel<br/>capture sheet. "
    }
]

function Slider() {
    var timer = setInterval(nextSlide, 5000);
}

function goToResearch(){
    console.log("click works");
    document.location = "/bitswebsite/research_info.html";
}

function goToService(){
    console.log("click works");
    document.location = "/bitswebsite/service_info.html";
}

function nextSlide() {
    if (slideCount == 0) {
        $("#miniText").html(slideInfo[1].miniText);
        $("#subMini").html(slideInfo[1].subMini);
        $("#boldTitle").html(slideInfo[1].boldTitle);
        $("#mainText").html(slideInfo[1].mainText);
        $("#circle1").css("background","transparent");
        $("#circle2").css("background","#5C737F");
        slideCount += 1;
    } else if (slideCount == 1) {
        $("#miniText").html(slideInfo[2].miniText);
        $("#subMini").html(slideInfo[2].subMini);
        $("#boldTitle").html(slideInfo[2].boldTitle);
        $("#mainText").html(slideInfo[2].mainText);
        $("#circle2").css("background","transparent");
        $("#circle3").css("background","#5C737F");
        slideCount += 1;
    }else{
        $("#miniText").html(slideInfo[0].miniText);
        $("#subMini").html(slideInfo[0].subMini);
        $("#boldTitle").html(slideInfo[0].boldTitle);
        $("#mainText").html(slideInfo[0].mainText);
        $("#circle3").css("background","transparent");
        $("#circle1").css("background","#5C737F");
        slideCount = 0;
    }
}


// Hiding the menu navbar-toggle when you click outside the menu bar
$(function () {
    $("#nav").blur(function (event) {
        var screenWidth = window.innerWidth;
        if (screenWidth < 767){
            $("#navbarNavDropdown").collapse('hide');
        }
    });
});

// Define a JQuery click handler for menu icon
/* We seclect a "menu-toggle" & attach a click event on it */
/* Which means that when the user click on it the 'selector: function()' should handle it */
/* 1st define a class called ".showing" & if this class it attached to our nav-menu then the nav-menu will open
* and when we remove it the nav-menu will be closed */
/* When the user clicks on the menu-toggle select the nav-menu & toggle the class 'showing' */
// Select ".nav ul" so that it can also show dropdown when user clicks on the menu-toggle
$(document).ready(function () {
    /* Keep in mind that we are now disabling the "Previous" default button */
    /* Add the next & prev arrow and call the class 'next' & 'prev' respectively */
    $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
        /* Copy responsive display from slick to make the carousel responsive */
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});
