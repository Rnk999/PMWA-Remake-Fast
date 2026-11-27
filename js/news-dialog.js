// # หน้าต่างรายละเอียดข่าว
// แสดงข้อมูลของการ์ดที่เลือก และใช้กลไกคืนโฟกัสของ dialog เมื่อปิด
(() => {
  const dialog = document.querySelector("#news-dialog");
  if (!dialog) return;
  const content = document.querySelector("#news-dialog-content");

  document.querySelectorAll("button[data-news-id]").forEach((button) => {
    button.addEventListener("click", () => {
      const item = window.newsData[button.dataset.newsId];
      if (!item) return;

      const heading = document.createElement("h2");
      heading.id = "news-dialog-title";
      heading.textContent = item.title;
      const meta = document.createElement("p");
      meta.className = "news-dialog-meta";
      const date = document.createElement("time");
      date.dateTime = item.date;
      date.textContent = item.dateLabel;
      const category = document.createElement("span");
      category.textContent = item.category;
      const sample = document.createElement("span");
      sample.textContent = "ข้อมูลตัวอย่าง";
      meta.append(category, " · ", date, " · ", sample);

      const summary = document.createElement("p");
      summary.textContent = item.summary;
      const note = document.createElement("p");
      note.textContent = "เนื้อหานี้เป็นข้อมูลจำลองสำหรับต้นแบบ ไม่ใช่ข่าวหรือประกาศจากหน่วยงาน";
      content.replaceChildren(heading, meta, summary, note);

      if (item.image) {
        const image = document.createElement("img");
        image.className = "news-dialog-image";
        image.src = item.image;
        image.alt = "ภาพประกอบข่าวตัวอย่าง";
        meta.after(image);
      }
      if (item.details) {
        const details = document.createElement("p");
        details.textContent = item.details;
        note.before(details);
      }

      siteLanguage.localize(content);
      // # คืนโฟกัสให้การ์ดที่เปิดข่าว รวมถึงเมื่อคลิกพื้นที่ภาพ
      button.focus({ preventScroll: true });
      dialog.showModal();
    });
  });

  dialog.addEventListener("click", (event) => { if (event.target === dialog) dialog.close(); });
})();
