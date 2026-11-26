// เมนูมือถือ: ควบคุมปุ่มเปิด/ปิดและแถบนำทางที่เชื่อมด้วย aria-controls
const menuButton = document.querySelector(".menu-toggle");
const primaryNavigation = document.querySelector("#primary-navigation");
const rootElement = document.documentElement;
const siteHeader = document.querySelector(".site-header");
const t = siteLanguage.text;

function updateHeaderHeight() {
  rootElement.style.setProperty("--header-height", `${Math.ceil(siteHeader.getBoundingClientRect().height)}px`);
}
rootElement.classList.add("has-fixed-header");
updateHeaderHeight();
new ResizeObserver(updateHeaderHeight).observe(siteHeader);

// URL ทางการแยกจากส่วนแสดงผล และเว้นว่างไว้จนกว่าจะได้รับการยืนยัน
const officialSocialUrls = { facebook: "", line: "" };
const mapUrl = "";

// ปรับขนาดตัวอักษรทั้งหน้าโดยจำกัดช่วงเพื่อป้องกันการเสียรูปแบบ
const fontScaleButtons = {
  decrease: document.querySelector("#font-decrease"),
  reset: document.querySelector("#font-reset"),
  increase: document.querySelector("#font-increase")
};
let fontScale = 1;

function setFontScale(nextScale) {
  fontScale = Math.min(1.25, Math.max(0.85, nextScale));
  rootElement.style.setProperty("--font-scale", fontScale.toFixed(2));
  Object.entries(fontScaleButtons).forEach(([name, button]) => {
    if (!button) return;
    const isSelected =
      (name === "decrease" && fontScale < 1) ||
      (name === "reset" && fontScale === 1) ||
      (name === "increase" && fontScale > 1);
    button.setAttribute("aria-pressed", String(isSelected));
    button.classList.toggle("is-active", isSelected);
  });
}

fontScaleButtons.decrease?.addEventListener("click", () => setFontScale(fontScale - 0.1));
fontScaleButtons.reset?.addEventListener("click", () => setFontScale(1));
fontScaleButtons.increase?.addEventListener("click", () => setFontScale(fontScale + 0.1));

// สลับตัวแปรสีของหน้าเพื่อเพิ่มความเปรียบต่าง และอัปเดตสถานะปุ่ม
const contrastButton = document.querySelector("#contrast-toggle");
const contrastStorageKey = "pmwa-site-contrast";

function updateContrastLabel() {
  contrastButton?.setAttribute("aria-label", t(rootElement.dataset.contrast === "high"
    ? "ปิดโหมดสีความเปรียบต่างสูง" : "เปิดโหมดสีความเปรียบต่างสูง"));
}

function setContrast(enabled) {
  if (enabled) rootElement.dataset.contrast = "high";
  else delete rootElement.dataset.contrast;
  contrastButton?.setAttribute("aria-pressed", String(enabled));
  updateContrastLabel();
}

function restoreContrast() {
  try {
    setContrast(localStorage.getItem(contrastStorageKey) === "high");
  } catch {
    // Keep the current mode when storage is unavailable.
  }
}

restoreContrast();
window.addEventListener("pageshow", (event) => {
  if (event.persisted) restoreContrast();
});
document.addEventListener("site-language-change", updateContrastLabel);
contrastButton?.addEventListener("click", () => {
  const enabled = rootElement.dataset.contrast !== "high";
  setContrast(enabled);
  try {
    localStorage.setItem(contrastStorageKey, enabled ? "high" : "normal");
  } catch {
    // The button still works on the current page.
  }
});

// แสดงช่องทางสังคมเป็นลิงก์เฉพาะเมื่อมีการกำหนด URL ทางการที่ปลอดภัย
document.querySelectorAll("[data-social-channel]").forEach((channel) => {
  const url = officialSocialUrls[channel.dataset.socialChannel];
  if (!url) return;

  try {
    const parsedUrl = new URL(url);
    if (!['https:', 'http:'].includes(parsedUrl.protocol)) return;

    const link = document.createElement("a");
    link.className = "social-channel social-channel-link";
    link.href = parsedUrl.href;
    link.target = "_blank";
    link.rel = "noopener noreferrer";
    link.setAttribute("aria-label", t("{0} (เปิดในแท็บใหม่)", channel.dataset.socialChannel));
    channel.querySelector("small")?.remove();
    while (channel.firstChild) link.append(channel.firstChild);
    channel.replaceWith(link);
  } catch {
    // คงข้อความรอ URL ไว้เมื่อค่าที่กำหนดไม่ใช่ URL ที่ถูกต้อง
  }
});

// ค้นหาและกรองคำถามที่พบบ่อย โดยใช้ native details/summary สำหรับ accordion
const faqSearch = document.querySelector("#faq-search");
const faqSearchClear = document.querySelector("#faq-search-clear");
const faqItems = [...document.querySelectorAll("[data-faq-item]")];
const faqFilters = [...document.querySelectorAll(".faq-filter[data-faq-category]")];
const faqResultsStatus = document.querySelector("#faq-results-status");
const faqEmptyState = document.querySelector("#faq-empty-state");
const faqResetFilters = document.querySelector("#faq-reset-filters");
const faqTotal = document.querySelector("[data-faq-total]");
let activeFaqCategory = "all";

function updateFaqResults() {
  if (!faqSearch || !faqItems.length) return;
  const query = faqSearch.value.trim().normalize().toLocaleLowerCase("th");
  const visibleItems = faqItems.filter((item) => {
    const matchesCategory = activeFaqCategory === "all" || item.dataset.faqCategory === activeFaqCategory;
    const matchesQuery = !query || siteLanguage.searchableContent(item).includes(query);
    item.hidden = !(matchesCategory && matchesQuery);
    return !item.hidden;
  });

  if (faqTotal) faqTotal.textContent = String(faqItems.length);
  if (faqResultsStatus) {
    faqResultsStatus.textContent = !visibleItems.length
      ? t("ไม่พบคำถามที่ตรงกับตัวกรอง")
      : query
        ? t("แสดงคำถาม {0} จาก {1} รายการ สำหรับ “{2}”", visibleItems.length, faqItems.length, faqSearch.value.trim())
        : t("แสดงคำถาม {0} จาก {1} รายการ", visibleItems.length, faqItems.length);
  }
  if (faqEmptyState) faqEmptyState.hidden = visibleItems.length > 0;
  if (faqSearchClear) faqSearchClear.hidden = !query;
}

faqSearch?.addEventListener("input", updateFaqResults);
faqSearchClear?.addEventListener("click", () => {
  faqSearch.value = "";
  updateFaqResults();
  faqSearch.focus();
});
faqFilters.forEach((filter) => {
  filter.addEventListener("click", () => {
    activeFaqCategory = filter.dataset.faqCategory;
    faqFilters.forEach((button) => {
      const isActive = button === filter;
      button.classList.toggle("is-active", isActive);
      button.setAttribute("aria-pressed", String(isActive));
    });
    updateFaqResults();
  });
});
faqResetFilters?.addEventListener("click", () => {
  faqSearch.value = "";
  activeFaqCategory = "all";
  faqFilters.forEach((button) => {
    const isActive = button.dataset.faqCategory === "all";
    button.classList.toggle("is-active", isActive);
    button.setAttribute("aria-pressed", String(isActive));
  });
  updateFaqResults();
  faqSearch.focus();
});
updateFaqResults();
document.addEventListener("site-language-change", updateFaqResults);

const aboutResultCount = document.querySelector("[data-about-result-count]");
if (aboutResultCount) {
  const updateAboutResultCount = () => {
    aboutResultCount.textContent = t("พบ {0} รายการ", aboutResultCount.dataset.aboutResultCount);
  };
  updateAboutResultCount();
  document.addEventListener("site-language-change", updateAboutResultCount);
}

// ค้นหาข้อความจากการ์ดที่มีอยู่บนหน้า และแสดงลิงก์ไปยังรายการที่ตรงกัน
const searchForm = document.querySelector("#site-search");
const searchInput = document.querySelector("#site-search-input");
const searchResults = document.querySelector("#search-results");
const searchResultStatus = document.querySelector("#search-results-status");
const searchResultList = document.querySelector("#search-result-list");

function renderSiteSearch() {
  const query = searchInput.value.trim().normalize().toLocaleLowerCase("th");
  searchResultList.replaceChildren();
  searchResults.hidden = false;

  if (!query) {
    searchResultStatus.textContent = t("พิมพ์คำค้นหาเพื่อค้นหาในเนื้อหาหน้านี้");
    return;
  }

  const matches = [...document.querySelectorAll("main article")].filter((article) => {
    const searchText = article.dataset.search?.normalize().toLocaleLowerCase("th") ?? "";
    return searchText.includes(query) || siteLanguage.searchableContent(article).includes(query);
  });
  searchResultStatus.textContent = matches.length
    ? t("พบ {0} รายการในเนื้อหาหน้านี้", matches.length)
    : t("ไม่พบรายการที่ตรงกับคำค้นหาในเนื้อหาหน้านี้");

  matches.forEach((article, index) => {
    if (!article.id) article.id = `search-result-${index + 1}`;
    const title = article.querySelector("h2, h3, h4")?.textContent.trim() || t("ข้อมูลในหน้าแรก");
    const item = document.createElement("li");
    const link = document.createElement("a");
    link.href = `#${article.id}`;
    link.textContent = title;
    item.append(link);
    searchResultList.append(item);
  });
}

searchForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const pageSearch = document.querySelector("form[data-page-search]");
  if (pageSearch) {
    const pageSearchInput = pageSearch.querySelector('input[type="search"]');
    pageSearchInput.value = searchInput.value;
    pageSearch.requestSubmit();
    pageSearchInput.focus();
    return;
  }
  setOpenDropdown(null);
  renderSiteSearch();
});
document.addEventListener("site-language-change", () => {
  if (!searchResults.hidden) renderSiteSearch();
});
searchResultList.addEventListener("click", (event) => {
  const link = event.target.closest("a");
  if (!link) return;
  const target = document.getElementById(link.hash.slice(1));
  if (target) {
    target.tabIndex = -1;
    target.focus({ preventScroll: true });
  }
  searchResults.hidden = true;
});

searchInput?.addEventListener("input", () => {
  if (!searchInput.value.trim()) searchResults.hidden = true;
});

// ข้อมูลจำลองแยกตามปี เพื่อใช้กับกราฟต้นแบบเท่านั้น ไม่ใช่สถิติทางการ
const monthlyButton = document.querySelector("#period-monthly");
const yearlyButton = document.querySelector("#period-yearly");
const usageYear = document.querySelector("#usage-year");
const usageData = document.querySelector("#usage-data");
const usageEmpty = document.querySelector("#usage-empty");
const usagePeriodStatus = document.querySelector("#usage-period-status");
const usageChart = document.querySelector("#usage-chart");
const usageTotal = document.querySelector("[data-usage-total]");
const usageTrend = document.querySelector("[data-usage-trend]");
const buddhistCurrentYear = new Date().getFullYear() + 543;
const waterUsageByYear = {
  2567: [1180000, 1142000, 1236000, 1290000, 1348000, 1312000, 1286000, 1305000, 1251000, 1209000, 1167000, 1224000],
  2568: [1245000, 1208000, 1276000, 1338000, 1401000, 1372000, 1346000, 1319000, 1291000, 1254000, 1216000, 1269000],
  2569: [1302000, 1258000, 1336000, 1394000, 1458000, 1426000, 1398000, 1371000, 1345000, 1310000, 1276000, 1334000]
};
const waterUsageMonths = [
  { name: "มกราคม", short: "ม.ค." }, { name: "กุมภาพันธ์", short: "ก.พ." },
  { name: "มีนาคม", short: "มี.ค." }, { name: "เมษายน", short: "เม.ย." },
  { name: "พฤษภาคม", short: "พ.ค." }, { name: "มิถุนายน", short: "มิ.ย." },
  { name: "กรกฎาคม", short: "ก.ค." }, { name: "สิงหาคม", short: "ส.ค." },
  { name: "กันยายน", short: "ก.ย." }, { name: "ตุลาคม", short: "ต.ค." },
  { name: "พฤศจิกายน", short: "พ.ย." }, { name: "ธันวาคม", short: "ธ.ค." }
];

function renderWaterUsage(year, period) {
  const values = waterUsageByYear[year];
  if (!usageChart || !values) return;

  const isCurrentYear = Number(year) === buddhistCurrentYear;
  const completedMonthCount = isCurrentYear ? new Date().getMonth() : 12;
  const visibleValues = values.slice(0, completedMonthCount);
  const maximum = Math.max(...visibleValues, 1);
  const numberFormat = new Intl.NumberFormat("en-US");
  usageChart.replaceChildren();
  usageChart.style.gridTemplateColumns = visibleValues.length
    ? `repeat(${visibleValues.length}, minmax(0, 1fr))`
    : "none";
  usageChart.setAttribute("role", "group");
  usageChart.setAttribute(
    "aria-label",
    t("{0} พ.ศ. {1} ข้อมูลจำลอง", t(period === "monthly" ? "สถิติรายเดือน" : "สถิติรายปี"), year)
  );

  visibleValues.forEach((value, index) => {
    const month = waterUsageMonths[index];
    const bar = document.createElement("button");
    const tooltip = t("{0} {1}: {2} ลูกบาศก์เมตร", t(month.name), year, numberFormat.format(value));
    bar.type = "button";
    bar.className = "chart-column";
    bar.dataset.month = String(index + 1);
    bar.dataset.value = String(value);
    bar.dataset.tooltip = tooltip;
    bar.setAttribute("aria-label", tooltip);
    bar.title = tooltip;
    bar.style.setProperty("--bar-height", `${Math.max(12, (value / maximum) * 100)}%`);

    const column = document.createElement("span");
    column.className = "chart-bar";
    column.setAttribute("aria-hidden", "true");
    const label = document.createElement("small");
    label.textContent = t(month.short);
    bar.append(column, label);
    usageChart.append(bar);
  });

  if (usageTotal) {
    usageTotal.textContent = numberFormat.format(visibleValues.reduce((sum, value) => sum + value, 0));
  }
  if (usageTrend) {
    const current = visibleValues.at(-1);
    const previous = visibleValues.at(-2);
    const change = current && previous ? ((current - previous) / previous) * 100 : null;
    usageTrend.textContent = change === null ? "—" : `${change > 0 ? "+" : ""}${change.toFixed(1)}%`;
  }
}

function setUsagePeriod(period) {
  const isMonthly = period === "monthly";
  monthlyButton?.setAttribute("aria-pressed", String(isMonthly));
  yearlyButton?.setAttribute("aria-pressed", String(!isMonthly));
  monthlyButton?.classList.toggle("is-selected", isMonthly);
  yearlyButton?.classList.toggle("is-selected", !isMonthly);
  if (usageYear) usageYear.disabled = isMonthly;
  if (usageData) usageData.hidden = false;
  if (usageEmpty) usageEmpty.hidden = true;

  const year = isMonthly ? buddhistCurrentYear : Number(usageYear?.value);
  renderWaterUsage(year, period);
  if (usagePeriodStatus) {
    usagePeriodStatus.textContent = t(isMonthly ? "ข้อมูลรายเดือน พ.ศ. {0} เป็นข้อมูลจำลอง ไม่ใช่สถิติทางการ" : "ข้อมูลรายปี พ.ศ. {0} เป็นข้อมูลจำลอง ไม่ใช่สถิติทางการ", year);
  }
}

monthlyButton?.addEventListener("click", () => setUsagePeriod("monthly"));
yearlyButton?.addEventListener("click", () => setUsagePeriod("yearly"));
usageYear?.addEventListener("change", () => setUsagePeriod("yearly"));
if (usageChart) {
  setUsagePeriod("monthly");
  document.addEventListener("site-language-change", () => {
    setUsagePeriod(yearlyButton.getAttribute("aria-pressed") === "true" ? "yearly" : "monthly");
  });
}

// ปุ่มแผนที่จะแจ้งสถานะเท่านั้นจนกว่าจะมี URL ทางการ
const mapButton = document.querySelector("#map-button");
const mapStatus = document.querySelector("#map-status");
const unavailableMapMessage = "ยังไม่มี URL แผนที่ทางการ จึงยังไม่สามารถเปิดแผนที่ได้";
let mapRequested = false;
document.addEventListener("site-language-change", () => {
  if (mapRequested) mapStatus.textContent = t(unavailableMapMessage);
});
mapButton?.addEventListener("click", () => {
  if (!mapUrl) {
    mapRequested = true;
    mapStatus.textContent = t(unavailableMapMessage);
    return;
  }
  window.open(mapUrl, "_blank", "noopener,noreferrer");
});

// Navigation disclosures share the same focus and dismissal behavior.
const dropdowns = [...primaryNavigation.querySelectorAll(".nav-dropdown")].map((container) => {
  const button = container.querySelector(".dropdown-toggle");
  return { container, button, menu: document.getElementById(button.getAttribute("aria-controls")) };
});
let openDropdown = null;

function setOpenDropdown(dropdown) {
  if (openDropdown) {
    openDropdown.button.setAttribute("aria-expanded", "false");
    openDropdown.menu.hidden = true;
  }
  openDropdown = dropdown;
  if (!dropdown) return;
  searchResults.hidden = true;
  dropdown.button.setAttribute("aria-expanded", "true");
  dropdown.menu.hidden = false;
}

dropdowns.forEach((dropdown) => {
  dropdown.button.addEventListener("click", () => {
    setOpenDropdown(openDropdown === dropdown ? null : dropdown);
  });
  dropdown.container.addEventListener("focusout", (event) => {
    if (openDropdown === dropdown && !dropdown.container.contains(event.relatedTarget)) {
      setOpenDropdown(null);
    }
  });
});

document.addEventListener("click", (event) => {
  if (openDropdown && !openDropdown.container.contains(event.target)) setOpenDropdown(null);
  if (!searchForm.contains(event.target) && !searchResults.contains(event.target)) searchResults.hidden = true;
});

document.addEventListener("keydown", (event) => {
  if (event.key !== "Escape" || event.defaultPrevented) return;
  if (openDropdown) {
    const { button } = openDropdown;
    setOpenDropdown(null);
    button.focus();
    event.preventDefault();
  } else if (!searchResults.hidden) {
    searchResults.hidden = true;
    searchInput.focus();
    event.preventDefault();
  }
});

if (menuButton && primaryNavigation) {
  // ปิดเมนูและคืนค่าป้ายกำกับสำหรับโปรแกรมอ่านหน้าจอ
  const closeMenu = () => {
    menuButton.setAttribute("aria-expanded", "false");
    menuButton.setAttribute("aria-label", t("เปิดเมนูนำทาง"));
    primaryNavigation.classList.remove("is-open");
  };

  // คลิกปุ่มสลับเมนู พร้อมอัปเดตสถานะที่เทคโนโลยีช่วยเหลืออ่านได้
  menuButton.addEventListener("click", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.setAttribute("aria-expanded", String(!isOpen));
    menuButton.setAttribute("aria-label", t(isOpen ? "เปิดเมนูนำทาง" : "ปิดเมนูนำทาง"));
    primaryNavigation.classList.toggle("is-open", !isOpen);
  });

  // เลือกลิงก์แล้วปิดเมนูเพื่อให้เนื้อหาปลายทางมองเห็นได้บนมือถือ
  primaryNavigation.addEventListener("click", (event) => {
    if (event.target.closest("a")) closeMenu();
  });

  // กด Escape เพื่อปิดเมนูและคืนโฟกัสไปยังปุ่มควบคุม
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && !event.defaultPrevented && primaryNavigation.classList.contains("is-open")) {
      closeMenu();
      menuButton.focus();
    }
  });

  document.addEventListener("site-language-change", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.setAttribute("aria-label", t(isOpen ? "ปิดเมนูนำทาง" : "เปิดเมนูนำทาง"));
  });

  // เมื่อกลับสู่จอใหญ่ ล้างสถานะเมนูมือถือที่ไม่จำเป็น
  window.addEventListener("resize", () => {
    if (window.innerWidth > 1100) closeMenu();
  });
}
