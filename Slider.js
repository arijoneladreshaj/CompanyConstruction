var i = 0;
var imgArray = [
  "IMG_6348.jpeg",
  "IMG_6352.jpeg",
  "IMG_6350.jpeg",
  "IMG_6353.jpeg",
  "center.jpg"
  
];

function ndrrimi() {
  document.getElementById("slideshow").src = imgArray[i];

  if (i < imgArray.length - 1) {
    i++;
  } else {
    i = 0;
  }

  setTimeout(ndrrimi, 3000);
}

window.onload = ndrrimi;
