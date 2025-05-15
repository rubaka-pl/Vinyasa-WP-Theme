document.addEventListener('DOMContentLoaded', function () {
  const postsContainer = document.getElementById('blog-posts');
  const pageNumbersContainer = document.querySelector('.page-numbers');
  const leftArrow = document.querySelector('.arrow.left');
  const rightArrow = document.querySelector('.arrow.right');

  const postsPerPage = 5;
  const totalPages = 8;
  let currentStartPage = 1;

  function getCurrentPage() {
    return parseInt(new URLSearchParams(window.location.search).get('page')) || 1;
  }

  function renderPagination() {
    pageNumbersContainer.innerHTML = '';

    for (let i = currentStartPage; i < currentStartPage + 6 && i <= totalPages; i++) {
      const link = document.createElement('a');
      link.textContent = i;
      link.href = `?page=${i}`;
      link.classList.add('page-btn');
      if (i === getCurrentPage()) {
        link.classList.add('active');
      }
      pageNumbersContainer.appendChild(link);
    }

    leftArrow.style.display = currentStartPage > 1 ? 'inline-block' : 'none';
    rightArrow.style.display = (currentStartPage + 5 < totalPages) ? 'inline-block' : 'none';
  }

  function renderPosts(data) {
    postsContainer.innerHTML = '';

    const page = getCurrentPage();
    const startIndex = (page - 1) * postsPerPage;
    const selectedPosts = data.slice(startIndex, startIndex + postsPerPage);

    selectedPosts.forEach(post => {
      const html = `
          <div class="blog-item">
            <div class="blog-thumb">
              <a href="/blog-single.html?post=${post.id}">
                <img src="${post.image}" alt="blog">
              </a>
            </div>
            <div class="blog-date-wrap">
              <div class="blog-date">
                <span class="blog-date-icon">
                  <i class="fa-regular fa-calendar"></i>
                </span>
                <span class="blog-date-text">${post.date}</span>
              </div>
              <div class="blog-date">
                <span class="blog-date-icon">
                  <i class="fa-solid fa-comment"></i>
                </span>
                <span class="blog-date-text">${post.comments} комментария</span>
              </div>
            </div>
            <div class="blog-body">
              <h3 class="blog-title">
                <a href="/blog-single.html?post=${post.id}">${post.title}</a>
              </h3>
              <div class="blog-desc">${post.desc}</div>
            </div>
          </div>
        `;
      postsContainer.insertAdjacentHTML('beforeend', html);
    });
  }

  function loadPosts() {
    fetch('/js/blogData.json')
      .then(response => response.json())
      .then(data => {
        renderPosts(data);
        renderPagination();
      });
  }

  leftArrow.addEventListener('click', function () {
    if (currentStartPage > 1) {
      currentStartPage -= 6;
      if (currentStartPage < 1) currentStartPage = 1;
      renderPagination();
    }
  });

  rightArrow.addEventListener('click', function () {
    if (currentStartPage + 5 < totalPages) {
      currentStartPage += 6;
      renderPagination();
    }
  });

  loadPosts();
});
