// Fetch Function 
const fetchFunction = (path, id, callback) => {
  fetch(`${path}`)
    .then(res => res.text())
    .then(data => {
      // console.log(data);
      document.getElementById(`${id}`).innerHTML = data;
      if(typeof callback == 'function'){
        callback();
      }
    });
}


fetchFunction('./components/footer.html', 'footer');
fetchFunction('./components/nav.html', 'navbar', () => {
    const currentPage = window.location.pathname;
    if (currentPage.includes('signin.html') || currentPage.includes('signup.html')) {
      const loginLink = document.querySelector('.login-link');
      if (loginLink) loginLink.style.display = 'none';
    }
});


