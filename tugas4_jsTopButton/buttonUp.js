const buttonUp = document.getElementById("buttonUp");

    window.onscroll = function() {
      if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        buttonUp.style.display = "block";
      } else {
        buttonUp.style.display = "none";
      }
    };

    buttonUp.onclick = function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    };