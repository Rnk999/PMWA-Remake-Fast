// # ตัวควบคุมรายการข่าว
// เก็บองค์ประกอบของตัวกรอง ข่าวเด่น รายการ แบ่งหน้า และหน้าต่างรายละเอียด
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
const featuredId = featuredNews?.querySelector("[data-news-id]")?.dataset.newsId;
const pageSize = 6;
let currentPage = 1;
let matchingCards = [];

// # เงื่อนไขค้นหาข่าว
// จับคู่คำค้นกับข้อความสองภาษา หมวดข่าว และปี พ.ศ.
function matchesNews(item) {
  const query = newsSearch.value.trim().normalize().toLocaleLowerCase("th");
  const searchText = siteLanguage.searchText(item.title, item.summary, item.category);
  const year = String(Number(item.date.slice(0, 4)) + 543);
  return (!query || searchText.includes(query))
    && (!newsCategory.value || item.category === newsCategory.value)
    && (!newsYear.value || year === newsYear.value);
}

// # การแสดงรายการข่าว
// กรองข่าวเด่นและข่าวทั่วไป แล้วอัปเดตจำนวนผลลัพธ์และหน้า
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
  newsCount.textContent = t("{0} รายการ", resultCount);
  newsPagination.hidden = matchingCards.length <= pageSize;
  newsPageStatus.textContent = t("หน้า {0} จาก {1}", currentPage, pageCount);
  newsSearchClear.hidden = !newsSearch.value;
  renderPageButtons(pageCount);
}

// # ปุ่มแบ่งหน้า
// สร้างปุ่มเลื่อนหน้าและระบุหน้าปัจจุบันสำหรับเทคโนโลยีช่วยเหลือ
function renderPageButtons(pageCount) {
  const buttons = [];
  const previous = document.createElement("button");
  previous.type = "button";
  previous.disabled = currentPage === 1;
  previous.setAttribute("aria-label", t("หน้าก่อนหน้า"));
  previous.innerHTML = '<span class="material-symbols-rounded" aria-hidden="true">chevron_left</span>';
  previous.addEventListener("click", () => changePage(currentPage - 1));
  buttons.push(previous);

  for (let page = 1; page <= pageCount; page++) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = String(page);
    button.setAttribute("aria-label", t("หน้า {0}", page));
    if (page === currentPage) button.setAttribute("aria-current", "page");
    button.addEventListener("click", () => changePage(page));
    buttons.push(button);
  }

  const next = document.createElement("button");
  next.type = "button";
  next.disabled = currentPage === pageCount;
  next.setAttribute("aria-label", t("หน้าถัดไป"));
  next.innerHTML = '<span class="material-symbols-rounded" aria-hidden="true">chevron_right</span>';
  next.addEventListener("click", () => changePage(currentPage + 1));
  buttons.push(next);
  newsPageButtons.replaceChildren(...buttons);
}

// # การเปลี่ยนหน้า
// แสดงข่าวของหน้าที่เลือกและเลื่อนไปยังส่วนผลลัพธ์
function changePage(page) {
  currentPage = page;
  renderNews();
  document.querySelector("#news-results-title").scrollIntoView({ block: "start" });
}

// # การล้างตัวกรอง
// คืนค่าช่องค้นหา หมวด และปี พร้อมกลับไปหน้าแรก
function resetNewsFilters() {
  newsSearch.value = "";
  newsCategory.value = "";
  newsYear.value = "";
  currentPage = 1;
  renderNews();
}

// # Event Listeners
// เชื่อมตัวกรองกับการแสดงข่าวและการเปลี่ยนภาษา
newsSearch.addEventListener("input", () => { currentPage = 1; renderNews(); });
newsCategory.addEventListener("change", () => { currentPage = 1; renderNews(); });
newsYear.addEventListener("change", () => { currentPage = 1; renderNews(); });
newsSearchClear.addEventListener("click", () => { newsSearch.value = ""; currentPage = 1; renderNews(); newsSearch.focus(); });
document.querySelector("#news-reset").addEventListener("click", resetNewsFilters);
document.addEventListener("site-language-change", renderNews);
renderNews();
