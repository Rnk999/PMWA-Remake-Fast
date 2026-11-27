// # ตัวควบคุมประกาศ
// อ้างถึงฟอร์ม รายการประกาศ และหน้าต่างรายละเอียด
const announcementForm = document.querySelector("#announcement-filters");
const announcementSearch = document.querySelector("#announcement-search");
const announcementArea = document.querySelector("#announcement-area");
const announcementDate = document.querySelector("#announcement-date");
const announcementCards = [...document.querySelectorAll(".announcement-card")];
const announcementCount = document.querySelector("#announcement-result-count");
const announcementEmpty = document.querySelector("#announcement-empty");
const announcementDialog = document.querySelector("#announcement-dialog");
const announcementDialogContent = document.querySelector("#announcement-dialog-content");
// # ข้อความสำหรับค้นหา
// เตรียมดัชนีข้อความจากชื่อ พื้นที่ และคำอธิบายของประกาศ
const announcementSearchText = new Map(announcementCards.map((card) => {
  const id = card.querySelector("[data-announcement-id]").dataset.announcementId;
  const { title, area, description } = window.announcementData[id];
  return [card, siteLanguage.searchText(title, area, id, description)];
}));

// # ระบบค้นหาและตัวกรอง
// กรองประกาศตามคำค้น ระดับ พื้นที่ และช่วงเวลา พร้อมอัปเดตผลลัพธ์
function filterAnnouncements() {
  const query = announcementSearch.value.trim().normalize().toLocaleLowerCase("th");
  const level = announcementForm.querySelector('input[name="announcement-level"]:checked')?.value || "";
  const area = announcementArea.value;
  const range = announcementDate.value;
  const today = new Date();
  today.setHours(0, 0, 0, 0);
  const days = { today: 1, week: 7, month: 30 }[range];
  let visible = 0;

  announcementCards.forEach((card) => {
    const cardDate = new Date(card.dataset.date);
    const age = (today - new Date(cardDate.getFullYear(), cardDate.getMonth(), cardDate.getDate())) / 86400000;
    const matches = (!query || announcementSearchText.get(card).includes(query))
      && (!level || card.dataset.level === level)
      && (!area || card.dataset.area.includes(area))
      && (days === undefined || (age >= 0 && age < days));
    card.hidden = !matches;
    if (matches) visible++;
  });

  announcementCount.textContent = t("{0} รายการ", visible);
  announcementEmpty.hidden = visible > 0;
}

// # Event Listeners
// เรียกกรองใหม่เมื่อค่าในฟอร์มหรือภาษาของหน้าเปลี่ยน
document.addEventListener("site-language-change", filterAnnouncements);
announcementForm?.addEventListener("input", filterAnnouncements);
announcementForm?.addEventListener("change", filterAnnouncements);
announcementForm?.addEventListener("reset", () => requestAnimationFrame(filterAnnouncements));
document.querySelector("#announcement-empty-reset")?.addEventListener("click", () => announcementForm.reset());

// # Modal Dialog
// สร้างรายละเอียดและลำดับความคืบหน้าจากประกาศที่เลือก
document.querySelectorAll("[data-announcement-id]").forEach((button) => {
  button.addEventListener("click", () => {
    const data = window.announcementData?.[button.dataset.announcementId];
    if (!data || !announcementDialog || !announcementDialogContent) return;

    const heading = document.createElement("h2");
    heading.id = "announcement-dialog-title";
    heading.textContent = t(data.title);
    const meta = document.createElement("p");
    meta.className = "dialog-meta";
    meta.textContent = [data.displayDate, data.area, data.statusLabel].map((part) => t(part)).join(" · ");
    const description = document.createElement("p");
    description.textContent = t(data.description);
    const progress = document.createElement("section");
    progress.className = "dialog-progress";
    const progressHeading = document.createElement("h3");
    progressHeading.textContent = t("ความคืบหน้าการดำเนินงาน (ข้อมูลจำลอง)");
    const list = document.createElement("ol");
    data.updates.forEach((update) => {
      const item = document.createElement("li");
      const time = document.createElement("time");
      time.textContent = t(update.time);
      const text = document.createElement("span");
      text.textContent = t(update.text);
      item.append(time, text);
      list.append(item);
    });
    progress.append(progressHeading, list);
    announcementDialogContent.replaceChildren(heading, meta, description, progress);
    announcementDialog.showModal();
  });
});

announcementDialog?.addEventListener("click", (event) => {
  if (event.target === announcementDialog) announcementDialog.close();
});

filterAnnouncements();
