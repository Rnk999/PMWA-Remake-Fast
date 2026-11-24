// เมนูมือถือ: ควบคุมปุ่มเปิด/ปิดและแถบนำทางที่เชื่อมด้วย aria-controls
const menuButton = document.querySelector(".menu-toggle");
const primaryNavigation = document.querySelector("#primary-navigation");
const rootElement = document.documentElement;

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
contrastButton?.addEventListener("click", () => {
  const isEnabled = rootElement.dataset.contrast === "high";
  if (isEnabled) delete rootElement.dataset.contrast;
  else rootElement.dataset.contrast = "high";
  contrastButton.setAttribute("aria-pressed", String(!isEnabled));
  contrastButton.setAttribute(
    "aria-label",
    isEnabled ? "เปิดโหมดสีความเปรียบต่างสูง" : "ปิดโหมดสีความเปรียบต่างสูง"
  );
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
    link.setAttribute("aria-label", `${channel.dataset.socialChannel} (เปิดในแท็บใหม่)`);
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
  const query = faqSearch.value.trim().toLocaleLowerCase("th");
  const visibleItems = faqItems.filter((item) => {
    const matchesCategory = activeFaqCategory === "all" || item.dataset.faqCategory === activeFaqCategory;
    const matchesQuery = !query || item.textContent.toLocaleLowerCase("th").includes(query);
    item.hidden = !(matchesCategory && matchesQuery);
    return !item.hidden;
  });

  if (faqTotal) faqTotal.textContent = String(faqItems.length);
  if (faqResultsStatus) {
    faqResultsStatus.textContent = visibleItems.length
      ? `แสดงคำถาม ${visibleItems.length} จาก ${faqItems.length} รายการ${query ? ` สำหรับ “${faqSearch.value.trim()}”` : ""}`
      : "ไม่พบคำถามที่ตรงกับตัวกรอง";
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

// ค้นหาข้อความจากการ์ดที่มีอยู่บนหน้า และแสดงลิงก์ไปยังรายการที่ตรงกัน
const searchForm = document.querySelector("#site-search");
const searchInput = document.querySelector("#site-search-input");
const searchResults = document.querySelector("#search-results");
const searchResultStatus = document.querySelector("#search-results-status");
const searchResultList = document.querySelector("#search-result-list");

searchForm?.addEventListener("submit", (event) => {
  event.preventDefault();
  const query = searchInput.value.trim().toLocaleLowerCase("th");
  searchResultList.replaceChildren();
  searchResults.hidden = false;

  if (!query) {
    searchResultStatus.textContent = "พิมพ์คำค้นหาเพื่อค้นหาในเนื้อหาหน้านี้";
    return;
  }

  const matches = [...document.querySelectorAll("main article")].filter((article) =>
    article.textContent.toLocaleLowerCase("th").includes(query)
  );
  searchResultStatus.textContent = matches.length
    ? `พบ ${matches.length} รายการในเนื้อหาหน้านี้`
    : "ไม่พบรายการที่ตรงกับคำค้นหาในเนื้อหาหน้านี้";

  matches.forEach((article, index) => {
    if (!article.id) article.id = `search-result-${index + 1}`;
    const title = article.querySelector("h2, h3")?.textContent.trim() || "ข้อมูลในหน้าแรก";
    const item = document.createElement("li");
    const link = document.createElement("a");
    link.href = `#${article.id}`;
    link.textContent = title;
    item.append(link);
    searchResultList.append(item);
  });
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
    `${period === "monthly" ? "สถิติรายเดือน" : "สถิติรายปี"} พ.ศ. ${year} ข้อมูลจำลอง`
  );

  visibleValues.forEach((value, index) => {
    const month = waterUsageMonths[index];
    const bar = document.createElement("button");
    const tooltip = `${month.name} ${year}: ${numberFormat.format(value)} ลูกบาศก์เมตร`;
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
    label.textContent = month.short;
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
    usagePeriodStatus.textContent = `ข้อมูล${isMonthly ? "รายเดือน" : "รายปี"} พ.ศ. ${year} เป็นข้อมูลจำลอง ไม่ใช่สถิติทางการ`;
  }
}

monthlyButton?.addEventListener("click", () => setUsagePeriod("monthly"));
yearlyButton?.addEventListener("click", () => setUsagePeriod("yearly"));
usageYear?.addEventListener("change", () => setUsagePeriod("yearly"));
setUsagePeriod("monthly");

// ปุ่มแผนที่จะแจ้งสถานะเท่านั้นจนกว่าจะมี URL ทางการ
const mapButton = document.querySelector("#map-button");
const mapStatus = document.querySelector("#map-status");
mapButton?.addEventListener("click", () => {
  if (!mapUrl) {
    mapStatus.textContent = "ยังไม่มี URL แผนที่ทางการ จึงยังไม่สามารถเปิดแผนที่ได้";
    return;
  }
  window.open(mapUrl, "_blank", "noopener,noreferrer");
});

// เมนู Dropdown บริการประชาชน
const servicesToggle = document.querySelector("#services-toggle");
const servicesMenu = document.querySelector("#services-menu");
const servicesDropdown = document.querySelector("#services-dropdown");

function closeServicesMenu() {
  if (!servicesToggle || !servicesMenu) return;
  servicesToggle.setAttribute("aria-expanded", "false");
  servicesMenu.hidden = true;
}

function openServicesMenu() {
  if (!servicesToggle || !servicesMenu) return;
  if (procurementStatus && !procurementStatus.hidden) {
    procurementStatus.hidden = true;
    procurementButton?.setAttribute("aria-expanded", "false");
  }
  servicesToggle.setAttribute("aria-expanded", "true");
  servicesMenu.hidden = false;
}

servicesToggle?.addEventListener("click", (event) => {
  event.stopPropagation();
  const isExpanded = servicesToggle.getAttribute("aria-expanded") === "true";
  if (isExpanded) {
    closeServicesMenu();
  } else {
    openServicesMenu();
  }
});

document.addEventListener("click", (event) => {
  if (servicesDropdown && !servicesDropdown.contains(event.target)) {
    closeServicesMenu();
  }
});

document.addEventListener("keydown", (event) => {
  if (event.key === "Escape" && servicesMenu && !servicesMenu.hidden) {
    closeServicesMenu();
    servicesToggle?.focus();
  }
});

// เปิด/ปิดข้อความสถานะจัดซื้อจัดจ้างที่ยังไม่เชื่อมกับแหล่งข้อมูลจริง
const procurementButton = document.querySelector("#procurement-toggle");
const procurementStatus = document.querySelector("#procurement-status");
procurementButton?.addEventListener("click", () => {
  const isExpanded = procurementButton.getAttribute("aria-expanded") === "true";
  procurementButton.setAttribute("aria-expanded", String(!isExpanded));
  procurementStatus.hidden = isExpanded;
  if (!isExpanded && servicesMenu && !servicesMenu.hidden) {
    closeServicesMenu();
  }
});

if (menuButton && primaryNavigation) {
  // ปิดเมนูและคืนค่าป้ายกำกับสำหรับโปรแกรมอ่านหน้าจอ
  const closeMenu = () => {
    menuButton.setAttribute("aria-expanded", "false");
    menuButton.setAttribute("aria-label", "เปิดเมนูนำทาง");
    primaryNavigation.classList.remove("is-open");
  };

  // คลิกปุ่มสลับเมนู พร้อมอัปเดตสถานะที่เทคโนโลยีช่วยเหลืออ่านได้
  menuButton.addEventListener("click", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.setAttribute("aria-expanded", String(!isOpen));
    menuButton.setAttribute("aria-label", isOpen ? "เปิดเมนูนำทาง" : "ปิดเมนูนำทาง");
    primaryNavigation.classList.toggle("is-open", !isOpen);
  });

  // เลือกลิงก์แล้วปิดเมนูเพื่อให้เนื้อหาปลายทางมองเห็นได้บนมือถือ
  primaryNavigation.addEventListener("click", (event) => {
    if (event.target.closest("a")) closeMenu();
  });

  // กด Escape เพื่อปิดเมนูและคืนโฟกัสไปยังปุ่มควบคุม
  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && primaryNavigation.classList.contains("is-open")) {
      closeMenu();
      menuButton.focus();
    }
    if (event.key === "Escape" && !procurementStatus.hidden) {
      procurementStatus.hidden = true;
      procurementButton.setAttribute("aria-expanded", "false");
      procurementButton.focus();
    }
  });

  // เมื่อกลับสู่จอใหญ่ ล้างสถานะเมนูมือถือที่ไม่จำเป็น
  window.addEventListener("resize", () => {
    if (window.innerWidth > 1100) closeMenu();
  });
}
