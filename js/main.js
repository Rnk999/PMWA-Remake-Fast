// เมนูมือถือ: ควบคุมปุ่มเปิด/ปิดและแถบนำทางที่เชื่อมด้วย aria-controls
const menuButton = document.querySelector(".menu-toggle");
const primaryNavigation = document.querySelector("#primary-navigation");

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
  });

  // เมื่อกลับสู่จอใหญ่ ล้างสถานะเมนูมือถือที่ไม่จำเป็น
  window.addEventListener("resize", () => {
    if (window.innerWidth > 800) closeMenu();
  });
}
