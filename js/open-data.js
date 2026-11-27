// # แค็ตตาล็อกชุดข้อมูล
// เตรียมตัวกรอง รายการ และข้อความที่ใช้ค้นหาชุดข้อมูล
(() => {
  const form = document.querySelector(".open-data-filters");
  const search = document.querySelector("#dataset-search");
  const topic = document.querySelector("#dataset-topic");
  const count = document.querySelector("#dataset-count");
  const empty = document.querySelector("#dataset-empty");
  const cards = Array.from(document.querySelectorAll(".open-data-card"), (card) => ({
    card,
    text: [card.querySelector("h2"), card.querySelector(".open-data-description")]
      .map(siteLanguage.searchableContent).join(" ")
  }));

  // # ระบบค้นหาและตัวกรอง
  // จับคู่คำค้นทุกคำและหัวข้อ แล้วอัปเดตจำนวนและสถานะว่าง
  function updateResults() {
    const query = search.value.trim().normalize().toLocaleLowerCase("th");
    const words = query.split(/\s+/).filter(Boolean);
    let matches = 0;

    cards.forEach(({ card, text }) => {
      const matchesTopic = !topic.value || card.dataset.topic === topic.value;
      const matchesSearch = words.every((word) => text.includes(word));
      card.hidden = !(matchesTopic && matchesSearch);
      if (!card.hidden) matches++;
    });

    count.textContent = query || topic.value
      ? t("พบ {0} จาก {1} ชุดข้อมูล", matches, cards.length)
      : t("แสดงทั้งหมด {0} ชุดข้อมูล", cards.length);
    empty.hidden = matches > 0;
  }

  // # Event Listeners
  // อัปเดตผลเมื่อค้นหา ล้างตัวกรอง กลับมายังหน้า หรือเปลี่ยนภาษา
  form.addEventListener("submit", (event) => {
    event.preventDefault();
    updateResults();
  });
  search.addEventListener("input", updateResults);
  topic.addEventListener("change", updateResults);
  form.addEventListener("reset", () => {
    requestAnimationFrame(() => {
      updateResults();
      search.focus();
    });
  });
  document.querySelector("#dataset-empty-reset").addEventListener("click", () => form.reset());
  window.addEventListener("pageshow", updateResults);
  document.addEventListener("site-language-change", updateResults);

  // # Modal Dialog
  // คัดลอกแม่แบบของชุดข้อมูลที่เลือกและแปลก่อนเปิดหน้าต่างพรีวิว
  const dialog = document.querySelector("#dataset-dialog");
  const content = document.querySelector("#dataset-dialog-content");
  const closeButton = dialog.querySelector("button");
  const previewButtons = [...document.querySelectorAll(".open-data-preview")];

  function openPreview(button) {
    const template = document.getElementById(`sample-${button.dataset.preview}`);
    const preview = template.content.cloneNode(true);
    siteLanguage.localize(preview);
    content.replaceChildren(preview);
    // # เริ่มอ่านจากหัวข้อเมื่อพรีวิวเป็นตารางยาว
    const heading = content.querySelector("#dataset-dialog-title[tabindex]");
    closeButton.autofocus = !heading;
    button.focus({ preventScroll: true });
    dialog.showModal();
    if (heading) {
      heading.focus({ preventScroll: true });
      dialog.scrollTop = 0;
    }
  }

  previewButtons.forEach((button) => button.addEventListener("click", () => openPreview(button)));

  // # สลับปีในตารางรายเดือน
  // เปลี่ยนเฉพาะตารางรายเดือน โดยยังคงยอดรวมของทุกปีไว้
  content.addEventListener("change", (event) => {
    if (event.target.id !== "consumption-year") return;
    content.querySelectorAll("[data-consumption-months]").forEach((table) => {
      table.hidden = table.dataset.consumptionMonths !== event.target.value;
    });
  });

  // # ลิงก์ตรงจากหน้าแรก
  // เปิดพรีวิวจากรหัสที่รู้จักและเลื่อนไปการ์ดที่จะรับโฟกัสเมื่อปิด
  const requestedDataset = new URLSearchParams(window.location.search).get("dataset");
  const requestedButton = previewButtons.find((button) => button.dataset.preview === requestedDataset);
  if (requestedButton) {
    requestedButton.closest(".open-data-card").scrollIntoView({ block: "center", behavior: "instant" });
    openPreview(requestedButton);
  }
})();
