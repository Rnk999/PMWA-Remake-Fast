const newsSearch = document.querySelector("#news-search");
const newsCategory = document.querySelector("#news-category");
const newsYear = document.querySelector("#news-year");
const newsCards = [...document.querySelectorAll(".news-card")];
const featuredNews = document.querySelector("#featured-news");
const newsGrid = document.querySelector("#news-grid");
const newsEmpty = document.querySelector("#news-empty");
const newsCount = document.querySelector("#news-results-count");
const newsPagination = document.querySelector("#news-pagination");
const newsPageStatus = document.querySelector("#news-page-status");
const newsPageButtons = document.querySelector("#news-page-buttons");
const newsSearchClear = document.querySelector("#news-search-clear");
const newsDialog = document.querySelector("#news-dialog");
const newsDialogContent = document.querySelector("#news-dialog-content");
const featuredId = featuredNews?.querySelector("[data-news-id]")?.dataset.newsId;
const pageSize = 6;
let currentPage = 1;
let matchingCards = [];

function matchesNews(item) {
  const query = newsSearch.value.trim().toLocaleLowerCase("th");
  const searchText = `${item.title} ${item.summary} ${item.category}`.toLocaleLowerCase("th");
  const year = String(Number(item.date.slice(0, 4)) + 543);
  return (!query || searchText.includes(query))
    && (!newsCategory.value || item.category === newsCategory.value)
    && (!newsYear.value || year === newsYear.value);
}

function renderNews() {
  const allNews = window.newsData || {};
  const featureMatches = featuredId && allNews[featuredId] ? matchesNews(allNews[featuredId]) : false;
  matchingCards = newsCards.filter((card) => matchesNews(allNews[card.dataset.newsId]));
  const resultCount = matchingCards.length + (featureMatches ? 1 : 0);
  const pageCount = Math.max(1, Math.ceil(matchingCards.length / pageSize));
  currentPage = Math.min(currentPage, pageCount);
  const pageStart = (currentPage - 1) * pageSize;
  const pageCards = new Set(matchingCards.slice(pageStart, pageStart + pageSize));

  if (featuredNews) featuredNews.hidden = !featureMatches;
  newsCards.forEach((card) => { card.hidden = !pageCards.has(card); });
  newsGrid.hidden = matchingCards.length === 0;
  newsEmpty.hidden = resultCount > 0;
  newsCount.textContent = `${resultCount} รายการ`;
  newsPagination.hidden = matchingCards.length <= pageSize;
  newsPageStatus.textContent = `หน้า ${currentPage} จาก ${pageCount}`;
  newsSearchClear.hidden = !newsSearch.value;
  renderPageButtons(pageCount);
}

function renderPageButtons(pageCount) {
  const buttons = [];
  const previous = document.createElement("button");
  previous.type = "button";
  previous.disabled = currentPage === 1;
  previous.setAttribute("aria-label", "หน้าก่อนหน้า");
  previous.innerHTML = '<span class="material-symbols-rounded" aria-hidden="true">chevron_left</span>';
  previous.addEventListener("click", () => changePage(currentPage - 1));
  buttons.push(previous);

  for (let page = 1; page <= pageCount; page++) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = String(page);
    button.setAttribute("aria-label", `หน้า ${page}`);
    if (page === currentPage) button.setAttribute("aria-current", "page");
    button.addEventListener("click", () => changePage(page));
    buttons.push(button);
  }

  const next = document.createElement("button");
  next.type = "button";
  next.disabled = currentPage === pageCount;
  next.setAttribute("aria-label", "หน้าถัดไป");
  next.innerHTML = '<span class="material-symbols-rounded" aria-hidden="true">chevron_right</span>';
  next.addEventListener("click", () => changePage(currentPage + 1));
  buttons.push(next);
  newsPageButtons.replaceChildren(...buttons);
}

function changePage(page) {
  currentPage = page;
  renderNews();
  document.querySelector("#news-results-title").scrollIntoView({ block: "start" });
}

function resetNewsFilters() {
  newsSearch.value = "";
  newsCategory.value = "";
  newsYear.value = "";
  currentPage = 1;
  renderNews();
}

function openNewsDetail(id) {
  const item = window.newsData?.[id];
  if (!item || !newsDialog || !newsDialogContent) return;
  const heading = document.createElement("h2");
  heading.id = "news-dialog-title";
  heading.textContent = item.title;
  const meta = document.createElement("p");
  meta.className = "news-dialog-meta";
  meta.textContent = `${item.category} · ${item.dateLabel} · ข้อมูลตัวอย่าง`;
  const summary = document.createElement("p");
  summary.textContent = item.summary;
  const note = document.createElement("p");
  note.textContent = "เนื้อหานี้เป็นข้อมูลจำลองสำหรับต้นแบบ ไม่ใช่ข่าวหรือประกาศจากหน่วยงาน";
  newsDialogContent.replaceChildren(heading, meta, summary, note);
  newsDialog.showModal();
}

newsSearch.addEventListener("input", () => { currentPage = 1; renderNews(); });
newsCategory.addEventListener("change", () => { currentPage = 1; renderNews(); });
newsYear.addEventListener("change", () => { currentPage = 1; renderNews(); });
newsSearchClear.addEventListener("click", () => { newsSearch.value = ""; currentPage = 1; renderNews(); newsSearch.focus(); });
document.querySelector("#news-reset").addEventListener("click", resetNewsFilters);
document.querySelectorAll("[data-news-id]").forEach((button) => button.addEventListener("click", () => openNewsDetail(button.dataset.newsId)));
newsDialog?.addEventListener("click", (event) => { if (event.target === newsDialog) newsDialog.close(); });

renderNews();
