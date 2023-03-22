      let navbarActive = document.getElementsByClassName("displayNav");
      let hamburger = document.getElementsByClassName("hamburger");
      let cross = document.getElementsByClassName("cross");

      hamburger[0].style.display = "block";
      cross[0].style.display = "none";


      function openNav() {
              navbarActive[0].style.display = "grid";
              hamburger[0].style.display = "none";
              cross[0].style.display = "block";
              hamburger[0].style.oapcity = "0.8";
              cross[0].style.oapcity = "1";
      }

      function closeNav() {
              navbarActive[0].style.display = "none";
              hamburger[0].style.display = "block";
              cross[0].style.display = "none";
      }
      
