document.addEventListener("DOMContentLoaded", function () {

  const form = document.querySelector(".login-form");

  function showError(input, message) {
    removeError(input);

    const error = document.createElement("p");
    error.className = "inline-error";
    error.textContent = message;

    error.style.color = "red";
    error.style.fontSize = "13px";
    error.style.marginTop = "6px";

    input.style.borderColor = "red";
    input.parentNode.appendChild(error);
  }

  function removeError(input) {
    const error = input.parentNode.querySelector(".inline-error");
    if (error) error.remove();
    input.style.borderColor = "#ccc";
  }

  const emailRegex = /^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  const passwordRegex =
    /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    let isValid = true;

    const email = form.elements[0]; 
    const password = form.elements[1];

    
    if (!emailRegex.test(email.value)) {
      showError(email, "Email ose username i pavlefshëm.");
      isValid = false;
    } else {
      removeError(email);
    }

   
    if (!passwordRegex.test(password.value)) {
      showError(
        password,
        "Fjalëkalimi duhet të ketë min. 8 karaktere, 1 shkronjë të madhe, 1 të vogël, 1 numër dhe 1 simbol."
      );
      isValid = false;
    } else {
      removeError(password);
    }

    
    if (isValid) {
      window.location.href = "projects.html";
    }
  });

  
  Array.from(form.elements).forEach(el => {
    if (el.tagName === "INPUT") {
      el.addEventListener("input", () => removeError(el));
    }
  });

});