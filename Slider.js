var i = 0;
var imgArray = [
  "1.jpeg",
  "2.jpeg",
  "3.jpeg",
  "4.jpeg",
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
