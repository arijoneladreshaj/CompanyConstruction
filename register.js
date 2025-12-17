document.addEventListener("DOMContentLoaded", function () {

  const form = document.querySelector("form");

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

  const usernameRegex = /^[a-zA-Z0-9._-]{3,20}$/;
  const emailRegex = /^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  const passwordRegex =
    /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    let isValid = true;

    const username = form.elements["username"];
    const email = form.elements["email"];
    const password = form.elements["password"];
    const confirmPassword = form.elements["confirmPassword"];
    const phone = form.elements["phone"];
    const dob = form.elements["dob"];

    if (!usernameRegex.test(username.value)) {
      showError(
        username,
        "Username i pavlefshëm. 3–20 karaktere; shkronja, numra, simbole - lejohen."
      );
      isValid = false;
    } else {
      removeError(username);
    }

    if (!emailRegex.test(email.value)) {
      showError(email, "Email i pavlefshëm.");
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

    if (confirmPassword.value !== password.value || confirmPassword.value === "") {
      showError(confirmPassword, "Fjalëkalimet nuk përputhen.");
      isValid = false;
    } else {
      removeError(confirmPassword);
    }

    if (phone.value !== "" && !/^\+?\d{7,15}$/.test(phone.value)) {
      showError(phone, "Numër telefoni i pavlefshëm.");
      isValid = false;
    } else {
      removeError(phone);
    }

    if (dob && dob.value !== "") {
      const [year, month, day] = dob.value.split("-").map(Number);
      const today = new Date();
      const currentYear = today.getFullYear();

      if (month < 1 || month > 12) {
        showError(dob, "Muaji duhet të jetë nga 1 deri në 12.");
        isValid = false;
      } else if (day < 1 || day > 31) {
        showError(dob, "Dita duhet të jetë nga 1 deri në 31.");
        isValid = false;
      } else if (year > currentYear) {
        showError(dob, "Viti nuk mund të jetë më i madh se viti aktual.");
        isValid = false;
      } else if (currentYear - year < 18) {
        showError(dob, "Duhet të keni së paku 18 vjeç.");
        isValid = false;
      } else {
        removeError(dob);
      }
    }

    if (isValid) {
       window.location.href ="login.html";
    }
  });

  Array.from(form.elements).forEach(el => {
    if (el.tagName === "INPUT") {
      el.addEventListener("input", () => removeError(el));
    }
  });

});

