document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");
  if (!form) return;

  function errorElFor(el) {
    const group = el.closest(".form-group") || el.parentElement;
    return group ? group.querySelector(".error-text") : null;
  }
  function setError(el, msg) {
    const e = errorElFor(el);
    if (e) e.textContent = msg;
    el.classList.add("input-error");
  }
  function clearError(el) {
    const e = errorElFor(el);
    if (e) e.textContent = "";
    el.classList.remove("input-error");
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const identifier = form.elements.identifier.value.trim();
    const password = form.elements.password.value;

    clearError(form.elements.identifier);
    clearError(form.elements.password);

    if (!identifier) return setError(form.elements.identifier, "Shkruaj emailin ose username.");
    if (!password) return setError(form.elements.password, "Shkruaj fjalëkalimin.");

    const saved = localStorage.getItem("primeconstruct_user");
    if (!saved) {
      setError(form.elements.identifier, "Nuk ka llogari të regjistruar. Regjistrohu fillimisht.");
      return;
    }

    const user = JSON.parse(saved);

    const idOk = (identifier === user.email) || (identifier === user.username);
    const pwOk = (password === user.password);

    if (!idOk) return setError(form.elements.identifier, "Email/Username i gabuar.");
    if (!pwOk) return setError(form.elements.password, "Fjalëkalimi i gabuar.");

    
    localStorage.setItem("primeconstruct_session", JSON.stringify({
      loggedIn: true,
      username: user.username,
      email: user.email,
      time: Date.now()
    }));

    alert("U kyqe me sukses!");
    window.location.href = "projects.html";
  });
});
