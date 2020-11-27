$(document).ready(function ($) {
  $("#contact-us").on("click", function (e) {
    location.href = "contact.html";
    // $("html, body").animate(
    //   {
    //     scrollTop: 0,
    //   },
    //   800
    // );
  });
  $("#more").on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault();

      console.log("hi");
      // Store hash
      var hash = "#About-us";

      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        800,
        function () {
          window.location.hash = hash;
        }
      );
    }
  });
});
