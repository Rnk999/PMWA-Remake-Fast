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

// เลือกช่วงเวลาสถิติโดยไม่สร้างข้อมูลรายปีที่ยังไม่มีแหล่งข้อมูล
const monthlyButton = document.querySelector("#period-monthly");
const yearlyButton = document.querySelector("#period-yearly");
const usageYear = document.querySelector("#usage-year");
const usageData = document.querySelector("#usage-data");
const usageEmpty = document.querySelector("#usage-empty");
const usagePeriodStatus = document.querySelector("#usage-period-status");

function setUsagePeriod(period) {
  const isMonthly = period === "monthly";
  monthlyButton.setAttribute("aria-pressed", String(isMonthly));
  yearlyButton.setAttribute("aria-pressed", String(!isMonthly));
  monthlyButton.classList.toggle("is-selected", isMonthly);
  yearlyButton.classList.toggle("is-selected", !isMonthly);
  usageData.hidden = !isMonthly;
  usageEmpty.hidden = isMonthly;
  usagePeriodStatus.textContent = isMonthly
    ? `ข้อมูลรายเดือน ปี พ.ศ. ${usageYear.value} เป็นตัวอย่างสำหรับต้นแบบ`
    : `ยังไม่มีข้อมูลรายปี พ.ศ. ${usageYear.value} สำหรับแสดงในต้นแบบ`;
}

monthlyButton?.addEventListener("click", () => setUsagePeriod("monthly"));
yearlyButton?.addEventListener("click", () => setUsagePeriod("yearly"));
usageYear?.addEventListener("change", () => {
  setUsagePeriod(yearlyButton.getAttribute("aria-pressed") === "true" ? "yearly" : "monthly");
});

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

// เปิด/ปิดข้อความสถานะจัดซื้อจัดจ้างที่ยังไม่เชื่อมกับแหล่งข้อมูลจริง
const procurementButton = document.querySelector("#procurement-toggle");
const procurementStatus = document.querySelector("#procurement-status");
procurementButton?.addEventListener("click", () => {
  const isExpanded = procurementButton.getAttribute("aria-expanded") === "true";
  procurementButton.setAttribute("aria-expanded", String(!isExpanded));
  procurementStatus.hidden = isExpanded;
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
