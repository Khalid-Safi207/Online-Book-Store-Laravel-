let searchInput = document.getElementById("search");
let resultBox = document.getElementById("searchResult");

let timeout = null;

searchInput.addEventListener("keyup", () => {

    clearTimeout(timeout);

    let query = searchInput.value.trim();

    if (query.length === 0) {
        resultBox.style.display = "none";
        resultBox.innerHTML = "";
        return;
    }

    // 🔥 debounce (يمنع ضغط السيرفر كل حرف)
    timeout = setTimeout(() => {

        fetch(`/api/books/${query}`)
            .then(res => res.json())
            .then(data => {

                resultBox.style.display = "block";
                resultBox.innerHTML = "";

                if (data.length > 0) {

                    data.forEach(book => {

                        resultBox.innerHTML += `
                            <a href="/book/${book.id}" class="search-item">
                                <img src="/storage/${book.book_img}" alt="">
                                <div>
                                    <span class="title">${book.book_name}</span>
                                </div>
                            </a>
                        `;
                    });

                } else {

                    resultBox.innerHTML = `
                        <div class="search-empty">
                            😢 لا يوجد نتائج
                        </div>
                    `;
                }

            })
            .catch(error => {
                console.error(error);
                resultBox.innerHTML = `
                    <div class="search-empty">
                        حدث خطأ في البحث
                    </div>
                `;
            });

    }, 300); // ⏱ debounce time

});