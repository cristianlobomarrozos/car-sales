let paginationLeftPos = "20px";
let paginationOpacity = 0;
let checkPaginationClick = 0;

$(".pagination-page-number").click(function() {
  $(".pagination-page-number").removeClass("active");
  $(this).addClass("active");
  paginationLeftPos = $(this).prop("offsetLeft") + "px";
  paginationOpacity = 1;
  checkPaginationClick = 1;

  $(".pagination-hover-overlay").css({
    left: paginationLeftPos,
    backgroundColor: "#00178a",
    opacity: paginationOpacity
  });
  $(this).css({
    color: "#fff"
  });
});

$(".pagination-page-number").hover(
  function() {
    paginationOpacity = 1;
    $(".pagination-hover-overlay").css({
      backgroundColor: "#00c1dd",
      left: $(this).prop("offsetLeft") + "px",
      opacity: paginationOpacity
    });

    $(".pagination-page-number.active").css({
      color: "#333d45"
    });

    $(this).css({
      color: "#fff"
    });
  },
  function() {
    if (checkPaginationClick) {
      paginationOpacity = 1;
    } else {
      paginationOpacity = 0;
    }

    $(".pagination-hover-overlay").css({
      backgroundColor: "#00178a",
      opacity: paginationOpacity,
      left: paginationLeftPos
    });

    $(this).css({
      color: "#333d45"
    });

    $(".pagination-page-number.active").css({
      color: "#fff"
    });
  }
);
let slider_index = 0;

function show_slide(index) {
  let slides = document.querySelectorAll('.slide');
  let dots = document.querySelectorAll('.dot-nav');

  if (index >= slides.length) slider_index = 0;
  if (index < 0) { slider_index = slides.length - 1 };

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = 'none';
    dots[i].classList.remove('active-dot');
  }

  slides[slider_index].style.display = 'block';
  dots[slider_index].classList.add('active-dot');
}

show_slide(slider_index);

document.querySelector('#arrow-prev').addEventListener('click', () => {
  show_slide(--slider_index);
});


document.querySelector('#arrow-next').addEventListener('click', () => {
  show_slide(++slider_index);
});


document.querySelectorAll('.dot-nav').forEach((element) => {
  element.addEventListener('click', function () {
    var dots = Array.prototype.slice.call(this.parentElement.children),
      dot_index = dots.indexOf(element);
    show_slide(slider_index = dot_index);
  })
});

