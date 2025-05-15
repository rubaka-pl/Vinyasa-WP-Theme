document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const postId = parseInt(urlParams.get("post"));

    if (!postId) {
        document.getElementById("post-title").innerText = "Пост не найден";
        document.getElementById("post-content").innerHTML = "<p>Извините, запрашиваемый пост не существует.</p>";
        document.querySelector(".blog-post-navigation").style.display = "none";
        return;
    }

    fetch('/js/blogData.json')
        .then(response => response.json())
        .then(posts => {
            const currentPost = posts.find(post => post.id === postId);

            if (currentPost) {
                document.getElementById("post-title").innerHTML = currentPost.title;
                document.getElementById("post-date").innerHTML = `<i class="fa-regular fa-calendar"></i> ${currentPost.date}`;
                document.getElementById("post-image").src = currentPost.image;
                document.getElementById("post-content").innerHTML = currentPost.desc;

                const breadcrumbsLast = document.querySelector('.breadcrumbs_last');
                if (breadcrumbsLast) {
                    breadcrumbsLast.textContent = currentPost.title;
                }

                const prevPost = posts.find(post => post.id === postId - 1);
                const nextPost = posts.find(post => post.id === postId + 1);

                const navigationSection = document.querySelector(".blog-post-navigation");
                navigationSection.innerHTML = "";

                if (prevPost) {
                    const prevHTML = `
              <a href="/blog-single.html?post=${prevPost.id}" class="post-navigation-item">
                  <div class="post-navigation-thumbnail"></div>
                  <div class="post-navigation-content">
                      <div class="post-navigation-label">Предыдущий пост</div>
                      <div class="post-navigation-title">${prevPost.title}</div>
                  </div>
                  <div class="post-navigation-arrow">&larr;</div>
              </a>`;
                    navigationSection.innerHTML += prevHTML;
                }

                if (nextPost) {
                    const nextHTML = `
              <a href="/blog-single.html?post=${nextPost.id}" class="post-navigation-item">
                  <div class="post-navigation-thumbnail"></div>
                  <div class="post-navigation-content">
                      <div class="post-navigation-label">Следующий пост</div>
                      <div class="post-navigation-title">${nextPost.title}</div>
                  </div>
                  <div class="post-navigation-arrow">&rarr;</div>
              </a>`;
                    navigationSection.innerHTML += nextHTML;
                }
            } else {
                document.getElementById("post-title").innerText = "Пост не найден";
                document.getElementById("post-content").innerHTML = "<p>Извините, запрашиваемый пост не существует.</p>";
                document.querySelector(".blog-post-navigation").style.display = "none";
            }
        })
        .catch(error => {
            console.error('Ошибка загрузки постов:', error);
            document.getElementById("post-title").innerText = "Ошибка загрузки";
            document.getElementById("post-content").innerHTML = "<p>Не удалось загрузить данные о постах.</p>";
        });
});
