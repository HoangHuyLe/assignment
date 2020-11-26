$(document).ready(function ($) {
  $("#contact-us").on("click", function (e) {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      800
    );
  });
  $("#more").on("click", function (event) {
    if (this.hash !== "") {
      event.preventDefault();

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
