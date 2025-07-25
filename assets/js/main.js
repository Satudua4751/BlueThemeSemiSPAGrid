$(function () {
  "use strict";

  /* scrollar */
  //new PerfectScrollbar(".notify-list")
  //new PerfectScrollbar(".search-content")
  //new PerfectScrollbar(".mega-menu-widgets")

  /* toggle button */

  $(".btn-toggle").click(function () {
    $("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($("body").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
      $("body").addClass("sidebar-hovered")
    }, function () {
      $("body").removeClass("sidebar-hovered")
    }))
  })


  /* menu */
  $(function () {
    $('#sidenav').metisMenu();
  });

  $(function () {
    for (var e = window.location, o = $(".metismenu li a").filter(function () {
      return this.href == e
    }).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
  });


  $(".sidebar-close").on("click", function () {
    $("body").removeClass("toggled")
  })


  /* dark mode button */
  $(".dark-mode i").click(function () {
    $(this).text(function (i, v) {
      return v === 'dark_mode' ? 'light_mode' : 'dark_mode'
    })
  });


  $(".dark-mode").click(function () {
    $("html").attr("data-bs-theme", function (i, v) {
      return v === 'dark' ? 'light' : 'dark';
    })
  })


  /* sticky header */
  $(document).ready(function () {
    $(window).on("scroll", function () {
      if ($(this).scrollTop() > 60) {
        $('.top-header .navbar').addClass('sticky-header');
      } else {
        $('.top-header .navbar').removeClass('sticky-header');
      }
    });
  });


  /* email */

  $(".email-toggle-btn").on("click", function () {
    $(".email-wrapper").toggleClass("email-toggled")
  }), $(".email-toggle-btn-mobile").on("click", function () {
    $(".email-wrapper").removeClass("email-toggled")
  }), $(".compose-mail-btn").on("click", function () {
    $(".compose-mail-popup").show()
  }), $(".compose-mail-close").on("click", function () {
    $(".compose-mail-popup").hide()
  });


  /* chat */

  $(".chat-toggle-btn").on("click", function () {
    $(".chat-wrapper").toggleClass("chat-toggled")
  }), $(".chat-toggle-btn-mobile").on("click", function () {
    $(".chat-wrapper").removeClass("chat-toggled")
  });


  /* switcher */

  $("#BlueTheme").on("click", function () {
    $("html").attr("data-bs-theme", "blue-theme")
  });

  $("#LightTheme").on("click", function () {
    $("html").attr("data-bs-theme", "light")
  });


  /* search control */

  $(".search-control").click(function () {
    $(".search-popup").addClass("d-block");
    $(".search-close").addClass("d-block");
  });


  $(".search-close").click(function () {
    $(".search-popup").removeClass("d-block");
    $(".search-close").removeClass("d-block");
  });


  $(".mobile-search-btn").click(function () {
    $(".search-popup").addClass("d-block");
  });


  $(".mobile-search-close").click(function () {
    $(".search-popup").removeClass("d-block");
  });

  /* menu active */

  $(function () {
    for (var e = window.location, o = $(".metismenu li a").filter(function () {
      return this.href == e
    }).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
  });

  function darkMode(e) {
    const t = document.getElementsByTagName("body")[0]
      , f = document.querySelectorAll(".btn.btn-link.text-dark, .material-icons.text-dark")
      , v = document.querySelectorAll(".btn.btn-link.text-white, .material-icons.text-white")
      , p = document.querySelectorAll("g");
    if (e.getAttribute("checked")) {
      t.classList.remove("dark-version");
      for (b = 0; b < a.length; b++)
        a[b].classList.contains("light") && (a[b].classList.add("dark"),
          a[b].classList.remove("light"));
      for (b = 0; b < n.length; b++)
        n[b].classList.contains("light") && (n[b].classList.add("dark"),
          n[b].classList.remove("light"));
      for (b = 0; b < i.length; b++)
        i[b].classList.contains("text-white") && (i[b].classList.remove("text-white"),
          i[b].classList.add("text-dark"));
      for (b = 0; b < s.length; b++)
        !s[b].classList.contains("text-white") || s[b].closest(".sidenav") || s[b].closest(".card.bg-gradient-dark") || (s[b].classList.remove("text-white"),
          s[b].classList.add("text-dark"));
      for (b = 0; b < r.length; b++)
        r[b].classList.contains("text-white") && (r[b].classList.remove("text-white"),
          r[b].classList.add("text-dark"));
      for (b = 0; b < c.length; b++)
        c[b].classList.contains("text-white") && !c[b].closest(".sidenav") && (c[b].classList.remove("text-white"),
          c[b].classList.add("text-dark"));
      for (b = 0; b < u.length; b++)
        u[b].classList.contains("text-white") && (u[b].classList.remove("text-white"),
          u[b].classList.remove("opacity-8"),
          u[b].classList.add("text-dark"));
      for (b = 0; b < g.length; b++)
        g[b].classList.contains("bg-gray-600") && (g[b].classList.remove("bg-gray-600"),
          g[b].classList.add("bg-gray-100"));
      for (b = 0; b < p.length; b++)
        p[b].hasAttribute("fill") && p[b].setAttribute("fill", "#252f40");
      for (b = 0; b < v.length; b++)
        v[b].closest(".card.bg-gradient-dark") || (v[b].classList.remove("text-white"),
          v[b].classList.add("text-dark"));
      for (b = 0; b < y.length; b++)
        y[b].classList.remove("border-dark");
      e.removeAttribute("checked")
    } else {
      t.classList.add("dark-version");
      for (var b = 0; b < a.length; b++)
        a[b].classList.contains("dark") && (a[b].classList.remove("dark"),
          a[b].classList.add("light"));
      for (var b = 0; b < n.length; b++)
        n[b].classList.contains("dark") && (n[b].classList.remove("dark"),
          n[b].classList.add("light"));
      for (var b = 0; b < i.length; b++)
        i[b].classList.contains("text-dark") && (i[b].classList.remove("text-dark"),
          i[b].classList.add("text-white"));
      for (var b = 0; b < l.length; b++)
        l[b].classList.contains("text-dark") && (l[b].classList.remove("text-dark"),
          l[b].classList.add("text-white"));
      for (var b = 0; b < o.length; b++)
        o[b].classList.contains("text-dark") && (o[b].classList.remove("text-dark"),
          o[b].classList.add("text-white"));
      for (var b = 0; b < d.length; b++)
        d[b].classList.contains("text-dark") && (d[b].classList.remove("text-dark"),
          d[b].classList.add("text-white"));
      for (var b = 0; b < u.length; b++)
        u[b].classList.contains("text-secondary") && (u[b].classList.remove("text-secondary"),
          u[b].classList.add("text-white"),
          u[b].classList.add("opacity-8"));
      for (var b = 0; b < m.length; b++)
        m[b].classList.contains("bg-gray-100") && (m[b].classList.remove("bg-gray-100"),
          m[b].classList.add("bg-gray-600"));
      for (var b = 0; b < f.length; b++)
        f[b].classList.remove("text-dark"),
          f[b].classList.add("text-white");
      for (var b = 0; b < p.length; b++)
        p[b].hasAttribute("fill") && p[b].setAttribute("fill", "#fff");
      for (var b = 0; b < h.length; b++)
        h[b].classList.add("border-dark");
      e.setAttribute("checked", "true")
    }
  }


});










