//image switching
$(document).ready(function () {
  var cover = $("#cover");
  var allIMg = $(".img-opt");
  var inc = $("#q-inc");
  var dre = $("#q-dri");

  var quantityCount = $("#quantityCount");

  $("#zoom-view").css({ background: `url("${cover[0].src}")` });

  $.each(allIMg, function (indexInArray, valueOfElement) {
    valueOfElement.addEventListener("click", function (tergate) {
      $("#zoom-view").css(
        "background",
        `url("${valueOfElement.src}") no-repeat`
      );
      console.log(`url("${valueOfElement.src}") `);
      cover.attr("src", valueOfElement.src);
    });
  });

  inc.on("click", function () {
    var quantityValue = +$("#quantityCount").val();
    var quantity = quantityValue + 1;
    quantityCount.val(quantity);
  });

  dre.on("click", function () {
    var quantityValue = +$("#quantityCount").val();
    if (quantityValue > 1) {
      var quantity = quantityValue - 1;
      quantityCount.val(quantity);
    }
  });
  var state = true;
  $("#SeenMmore").on("click", function (e) {
    if (state) {
      $("#TextLIst").css("height", "auto");
      $("#SeenMmore").text("Less More Product Details");
      state = false;
    } else {
      $("#TextLIst").css("height", "261px");
      $("#SeenMmore").text("See More Product Details");
      state = true;
    }
  });
});

//Zoom effects
const coverIMg = document.querySelector("#coverIMg");
const lance = document.querySelector("#lance");
const zoomView = document.querySelector("#zoom-view");
const zoomViewContainer = document.querySelector("#zoomViewContainer");
const cover = document.querySelector("#cover");

let width = cover.getBoundingClientRect().width;
let heaight = cover.getBoundingClientRect().height;
zoomView.style.height = heaight + "px";
zoomViewContainer.style.width = width + "px";
document.addEventListener("mousemove", (e) => {
  if (e.target.matches("[leance]")) {
    zoomViewContainer.style.display = "block";
    let x = e.clientX - coverIMg.offsetLeft;
    let y = e.pageY - coverIMg.offsetTop;
    lance.style.left = x - 60 + "px";
    lance.style.top = y - 40 + "px";
    zoomView.style.backgroundSize = "600% 600%";
    let width = cover.getBoundingClientRect().width;
    let heaight = cover.getBoundingClientRect().height;
    zoomView.style.height = heaight + "px";
    zoomView.style.width = width + "px";
    zoomView.style.backgroundPosition =
      (x - width / 8) * -6 - 100 + "px " + (y - heaight / 8 + 25) * -6 + "px";
  } else {
    zoomViewContainer.style.display = "none";
  }
});

// slider
const sliderParent = document.querySelector("#sliderIMG"),
  next = document.querySelector("#next"),
  provious = document.querySelector("#provious"),
  sub_img = document.querySelectorAll("#sliderIMG .sub_img"),
  sliderParentWidth = coverIMg.getBoundingClientRect().width;
const singleItem = sub_img[0].offsetWidth; // sliderParent.offsetWidth / sub_img.length;
console.log(sliderParent.offsetWidth);
console.log(sub_img.length);
let inc = 0;
let prv;
next.addEventListener("click", () => {
  inc += singleItem;
  //
  if (sub_img.length * singleItem - inc <= sliderParent.offsetWidth) {
    inc = prv;
    return;
  }
  // console.log(sub_img.length * 76 - inc);
  // console.log(sliderParent.offsetWidth);
  prv = inc;
  sliderParent.scrollLeft = inc;
  // console.log(sub_img.length *   console.log(sliderParent.offsetWidth);
  //  - inc <= sliderParent.offsetWidth + 1);
});
provious.addEventListener("click", () => {
  inc -= singleItem;
  if (inc < 0) {
    inc = 0;
  }
  sliderParent.scrollLeft = inc;
});

function dragdraggableSlider(selector) {
  const sliderParent = document.querySelectorAll(selector);
  sliderParent.forEach((sliderParent) => {
    let drag = false,
      startX,
      scrollLeft,
      x,
      pageX;

    function stopDrag() {
      sliderParent.classList.remove("grabing");
      drag = false;
    }

    function draging(e) {
      e.preventDefault();
      if (!drag) return;
      x = e.pageX - sliderParent.offsetLeft;
      const walk = x - startX;
      sliderParent.scrollLeft = scrollLeft - walk;
    }

    const mousedown = (e) => {
      e.preventDefault();
      drag = true;

      sliderParent.classList.add("grabing");
      startX = e.pageX - sliderParent.offsetLeft;
      scrollLeft = sliderParent.scrollLeft;
    };

    document.addEventListener("mouseup", stopDrag);
    //FOR PC
    sliderParent.addEventListener("mousemove", draging);
    sliderParent.addEventListener("mousedown", mousedown);
    sliderParent.addEventListener("mouseup", stopDrag);

    //FOR MOBILE
    const mousedownMobile = (e) => {
      drag = true;
      try {
        pageX = e.changedTouches[0].pageX;
      } catch {
        pageX = pageX;
      }
      startX = pageX - sliderParent.offsetLeft;
      scrollLeft = sliderParent.scrollLeft;
    };

    function dragingMObile(e) {
      if (!drag) return;
      try {
        x = e.changedTouches[0].pageX;
      } catch {
        x = x;
      }

      const walk = x - startX;
      sliderParent.scrollLeft = scrollLeft - walk;
    }

    sliderParent.addEventListener("touchmove", dragingMObile);
    sliderParent.addEventListener("touchstart", mousedownMobile);
    sliderParent.addEventListener("touchend", stopDrag);
  });
}

dragdraggableSlider("#sliderIMG");
