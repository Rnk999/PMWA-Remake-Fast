// # ตัวควบคุมรายการจัดซื้อจัดจ้าง
// เก็บฟอร์ม ตาราง ข้อความค้นหา และสถานะการแบ่งหน้า
const procurementFilters = document.querySelector("#procurement-filters");
const procurementSearch = document.querySelector("#procurement-search");
const procurementCategory = document.querySelector("#procurement-category");
const procurementYear = document.querySelector("#procurement-year");
const procurementDefaultYear = procurementYear.value;
const procurementRecords = document.querySelector("#procurement-records");
const procurementRows = [...procurementRecords.querySelectorAll("[data-procurement-record]")];
const procurementSearchText = new Map(procurementRows.map((row) => [
  row,
  [...row.querySelectorAll(".procurement-record-title, .procurement-record-meta, .procurement-badge, .procurement-date")]
    .map(siteLanguage.searchableContent)
    .join(" ")
]));
const procurementPageSize = Number(procurementRecords.dataset.pageSize);
const procurementQuickButtons = [...procurementFilters.querySelectorAll("[data-procurement-quick]")];
const procurementPages = document.querySelector("#procurement-pages");
const procurementPageNumbers = document.querySelector("#procurement-page-numbers");
const procurementPrevious = procurementPages.querySelector('[data-procurement-step="-1"]');
const procurementNext = procurementPages.querySelector('[data-procurement-step="1"]');
const procurementPreview = document.querySelector("#procurement-preview");
let procurementQuickFilter = "";
let procurementPage = 1;

// # การแสดงรายการจัดซื้อจัดจ้าง
// กรองแถวและอัปเดตจำนวนผลลัพธ์ แถวที่มองเห็น และปุ่มแบ่งหน้า
function renderProcurement() {
  const query = procurementSearch.value.trim().normalize().toLocaleLowerCase("th");
  const year = procurementYear.value;
  const category = procurementCategory.value;
  const yearRows = procurementRows.filter((row) => !year || row.dataset.year === year);
  const matches = yearRows.filter((row) =>
    (!category || row.dataset.category === category)
    && (!procurementQuickFilter || row.dataset.tags.split(" ").includes(procurementQuickFilter))
    && (!query || procurementSearchText.get(row).includes(query))
  );
  const pageCount = Math.ceil(matches.length / procurementPageSize);
  const offset = (procurementPage - 1) * procurementPageSize;
  const visibleRows = new Set(matches.slice(offset, offset + procurementPageSize));

  procurementRows.forEach((row) => { row.hidden = !visibleRows.has(row); });
  procurementQuickButtons.forEach((button) => {
    button.setAttribute("aria-pressed", String(button.dataset.procurementQuick === procurementQuickFilter));
  });
  document.querySelector("#procurement-summary-year").textContent = year || t("ทุกปี");
  document.querySelector("#procurement-summary-total").textContent = t("{0} รายการ", yearRows.length);
  document.querySelector("#procurement-empty").hidden = matches.length > 0;
  document.querySelector("#procurement-results-status").textContent = matches.length
    ? t("แสดง {0}–{1} จาก {2} รายการตัวอย่าง", offset + 1, offset + visibleRows.size, matches.length)
    : t("ไม่พบประกาศที่ตรงกับตัวกรอง");

  procurementPages.hidden = pageCount < 2;
  procurementPrevious.disabled = procurementPage <= 1;
  procurementNext.disabled = procurementPage >= pageCount;
  procurementPageNumbers.replaceChildren();
  for (let page = 1; page <= pageCount; page += 1) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = String(page);
    button.dataset.procurementPage = String(page);
    button.setAttribute("aria-label", t("หน้า {0}", page));
    if (page === procurementPage) button.setAttribute("aria-current", "page");
    procurementPageNumbers.append(button);
  }
}

// # การใช้ตัวกรอง
// กลับไปหน้าแรกก่อนแสดงผลตามตัวกรองล่าสุด
function applyProcurementFilters() {
  procurementPage = 1;
  renderProcurement();
}

// # Event Listeners
// เชื่อมฟอร์ม ปุ่มกรองด่วน และปุ่มแบ่งหน้ากับการอัปเดตรายการ
procurementFilters.addEventListener("submit", (event) => {
  event.preventDefault();
  applyProcurementFilters();
});

procurementSearch.addEventListener("input", applyProcurementFilters);
procurementCategory.addEventListener("change", applyProcurementFilters);
procurementYear.addEventListener("change", applyProcurementFilters);

procurementQuickButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const filter = button.dataset.procurementQuick;
    procurementQuickFilter = procurementQuickFilter === filter ? "" : filter;
    applyProcurementFilters();
  });
});

procurementFilters.addEventListener("reset", (event) => {
  event.preventDefault();
  procurementSearch.value = "";
  procurementCategory.value = "";
  procurementYear.value = procurementDefaultYear;
  procurementQuickFilter = "";
  applyProcurementFilters();
  procurementSearch.focus();
});

procurementPages.addEventListener("click", (event) => {
  const button = event.target.closest("button");
  if (!button) return;
  procurementPage = button.dataset.procurementPage
    ? Number(button.dataset.procurementPage)
    : procurementPage + Number(button.dataset.procurementStep);
  renderProcurement();
  procurementPageNumbers.querySelector('[aria-current="page"]').focus({ preventScroll: true });
  document.querySelector(".procurement-table-wrap").scrollIntoView({ block: "start" });
});

// # Modal Dialog
// อ่านข้อมูลจากแถวที่เลือกแล้วเปิดหน้าต่างพรีวิวประกาศ
procurementRecords.addEventListener("click", (event) => {
  const button = event.target.closest("[data-procurement-preview]");
  if (!button) return;
  const row = button.closest("[data-procurement-record]");
  document.querySelector("#procurement-preview-title").textContent = row.querySelector(".procurement-record-title").textContent;
  document.querySelector("#procurement-preview-category").textContent =
    `${row.querySelector(".procurement-badge").textContent} · ${row.querySelector(".procurement-date").textContent}`;
  document.querySelector("#procurement-preview-meta").textContent = row.querySelector(".procurement-record-meta").textContent;
  procurementPreview.showModal();
});

document.addEventListener("site-language-change", renderProcurement);
renderProcurement();
