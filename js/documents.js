const documentRecords = [
  { id: "form-sample-01", kind: "form", category: "แบบฟอร์ม", format: "PDF", title: "ตัวอย่างจำลอง: แบบคำร้องขอรับบริการ", description: "ตัวอย่างรายการแบบฟอร์มสำหรับสาธิตการค้นหาเอกสาร" },
  { id: "form-sample-02", kind: "form", category: "แบบฟอร์ม", format: "DOCX", title: "ตัวอย่างจำลอง: แบบฟอร์มแจ้งข้อมูลผู้ใช้น้ำ", description: "รายการจำลองสำหรับแสดงรูปแบบไฟล์เอกสารที่แก้ไขได้" },
  { id: "form-sample-03", kind: "form", category: "แบบฟอร์ม", format: "PDF", title: "ตัวอย่างจำลอง: แบบคำขอตรวจสอบข้อมูลบริการ", description: "ข้อมูลตัวอย่าง ไม่ใช่แบบฟอร์มที่หน่วยงานประกาศใช้" },
  { id: "form-sample-04", kind: "form", category: "แบบฟอร์ม", format: "DOCX", title: "ตัวอย่างจำลอง: แบบบันทึกข้อมูลประกอบคำร้อง", description: "รายการจำลองสำหรับสาธิตการกรองตามประเภทไฟล์" },
  { id: "form-sample-05", kind: "form", category: "แบบฟอร์ม", format: "PDF", title: "ตัวอย่างจำลอง: แบบฟอร์มติดต่อกองการประปา", description: "ใช้แสดงตัวอย่างข้อมูลหมวดแบบฟอร์มในต้นแบบเว็บไซต์" },
  { id: "form-sample-06", kind: "form", category: "แบบฟอร์ม", format: "PDF", title: "ตัวอย่างจำลอง: รายการเอกสารประกอบการติดต่อ", description: "หัวข้อและรายละเอียดนี้เป็นข้อความจำลอง" },
  { id: "publication-sample-01", kind: "publication", category: "คู่มือและแนวทาง", format: "PDF", title: "ตัวอย่างจำลอง: คู่มือการติดต่อขอรับบริการ", description: "ตัวอย่างรายการคู่มือสำหรับประชาชน ไม่มีเอกสารจริงแนบ" },
  { id: "publication-sample-02", kind: "publication", category: "คู่มือและแนวทาง", format: "PDF", title: "ตัวอย่างจำลอง: แนวทางเตรียมข้อมูลก่อนติดต่อ", description: "รายการจำลองเพื่อสาธิตการแสดงคำอธิบายเอกสาร" },
  { id: "publication-sample-03", kind: "publication", category: "แผนงานและรายงาน", format: "PDF", title: "ตัวอย่างจำลอง: โครงร่างรายงานประจำปี", description: "ยังไม่มีวันที่เผยแพร่หรือไฟล์จริงในต้นแบบนี้" },
  { id: "publication-sample-04", kind: "publication", category: "แผนงานและรายงาน", format: "XLSX", title: "ตัวอย่างจำลอง: ตารางข้อมูลประกอบรายงาน", description: "รูปแบบไฟล์จำลองสำหรับสาธิตตัวกรองประเภทเอกสาร" },
  { id: "publication-sample-05", kind: "publication", category: "ข้อมูลทั่วไป", format: "PDF", title: "ตัวอย่างจำลอง: เอกสารข้อมูลทั่วไป", description: "รายการตัวอย่างสำหรับสาธิตหน้ารวมเอกสารเผยแพร่" },
  { id: "publication-sample-06", kind: "publication", category: "ข้อมูลทั่วไป", format: "PDF", title: "ตัวอย่างจำลอง: เอกสารแนะนำการใช้งานเว็บไซต์", description: "ไม่ใช่เอกสารหรือประกาศอย่างเป็นทางการ" }
];

const documentsSearch = document.querySelector("#documents-search");
const documentsCategory = document.querySelector("#documents-category");
const documentsFormat = document.querySelector("#documents-format");
const documentsCount = document.querySelector("#documents-count");
const documentsFilterStatus = document.querySelector("#documents-filter-status");
const documentsSearchClear = document.querySelector("#documents-search-clear");
const documentsEmpty = document.querySelector("#documents-empty");
const documentsPagination = document.querySelector("#documents-pagination");
const documentsPageStatus = document.querySelector("#documents-page-status");
const documentsPageButtons = document.querySelector("#documents-page-buttons");
const documentsPageSize = 6;
let currentDocumentsPage = 1;
let matchingDocuments = [];
let documentActionFeedback;

function makeDocumentCard(item) {
  const card = document.createElement("article");
  card.className = "documents-item";
  card.dataset.search = siteLanguage.searchText(item.title, item.description, item.category, item.format);

  const iconBox = document.createElement("span");
  iconBox.className = "documents-file-icon";
  iconBox.dataset.format = item.format;
  const fileIcon = document.createElement("span");
  fileIcon.className = "material-symbols-rounded";
  fileIcon.setAttribute("aria-hidden", "true");
  fileIcon.textContent = item.format === "XLSX" ? "table_view" : "description";
  iconBox.append(fileIcon);

  const copy = document.createElement("div");
  copy.className = "documents-item-copy";
  const tags = document.createElement("div");
  tags.className = "documents-item-tags";
  const category = document.createElement("span");
  category.className = "documents-category";
  category.textContent = t(item.category);
  const sampleTag = document.createElement("span");
  sampleTag.className = "documents-sample-tag";
  sampleTag.textContent = t("ข้อมูลจำลอง");
  tags.append(category, sampleTag);
  const title = document.createElement("h4");
  title.textContent = t(item.title);
  const description = document.createElement("p");
  description.textContent = t(item.description);
  const meta = document.createElement("div");
  meta.className = "documents-item-meta";
  const format = document.createElement("span");
  format.textContent = t("รูปแบบไฟล์ตัวอย่าง: {0}", item.format);
  meta.append(format);
  copy.append(tags, title, description, meta);

  const actions = document.createElement("div");
  actions.className = "documents-item-actions";
  [["visibility", "ดูตัวอย่าง", "preview"], ["download", "ดาวน์โหลด", "download"]].forEach(([icon, label, action]) => {
    const button = document.createElement("button");
    button.className = `documents-action${action === "download" ? " documents-action-primary" : ""}`;
    button.type = "button";
    button.dataset.documentAction = action;
    button.dataset.documentId = item.id;
    const actionIcon = document.createElement("span");
    actionIcon.className = "material-symbols-rounded";
    actionIcon.setAttribute("aria-hidden", "true");
    actionIcon.textContent = icon;
    button.append(actionIcon, document.createTextNode(t(label)));
    actions.append(button);
  });

  card.append(iconBox, copy, actions);
  return card;
}

function renderDocumentPageButtons(pageCount) {
  const buttons = [];
  const addButton = (label, page, ariaLabel, disabled = false, current = false) => {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = label;
    button.setAttribute("aria-label", ariaLabel);
    button.disabled = disabled;
    if (current) button.setAttribute("aria-current", "page");
    button.addEventListener("click", () => changeDocumentsPage(page));
    buttons.push(button);
  };

  addButton("chevron_left", Math.max(1, currentDocumentsPage - 1), t("หน้าก่อนหน้า"), currentDocumentsPage === 1);
  buttons[0].innerHTML = '<span class="material-symbols-rounded" aria-hidden="true">chevron_left</span>';
  for (let page = 1; page <= pageCount; page += 1) {
    addButton(String(page), page, t("หน้า {0}", page), false, page === currentDocumentsPage);
  }
  addButton("chevron_right", Math.min(pageCount, currentDocumentsPage + 1), t("หน้าถัดไป"), currentDocumentsPage === pageCount);
  buttons[buttons.length - 1].innerHTML = '<span class="material-symbols-rounded" aria-hidden="true">chevron_right</span>';
  documentsPageButtons.replaceChildren(...buttons);
}

function renderDocuments({ preserveFeedback = false } = {}) {
  if (!preserveFeedback) documentActionFeedback = null;
  const query = documentsSearch.value.trim().normalize().toLocaleLowerCase("th");
  matchingDocuments = documentRecords.filter((item) => {
    const searchableText = siteLanguage.searchText(item.title, item.description, item.category, item.format);
    return (!query || searchableText.includes(query))
      && (!documentsCategory.value || item.category === documentsCategory.value)
      && (!documentsFormat.value || item.format === documentsFormat.value);
  });

  const pageCount = Math.max(1, Math.ceil(matchingDocuments.length / documentsPageSize));
  currentDocumentsPage = Math.min(currentDocumentsPage, pageCount);
  const pageItems = matchingDocuments.slice((currentDocumentsPage - 1) * documentsPageSize, currentDocumentsPage * documentsPageSize);
  const forms = pageItems.filter((item) => item.kind === "form");
  const publications = pageItems.filter((item) => item.kind === "publication");
  document.querySelector("#forms-list").replaceChildren(...forms.map(makeDocumentCard));
  document.querySelector("#publications-list").replaceChildren(...publications.map(makeDocumentCard));
  document.querySelector("#forms-group").hidden = forms.length === 0;
  document.querySelector("#publications-group").hidden = publications.length === 0;
  document.querySelector("#forms-count").textContent = t("{0} รายการในหน้านี้", forms.length);
  document.querySelector("#publications-count").textContent = t("{0} รายการในหน้านี้", publications.length);
  documentsEmpty.hidden = matchingDocuments.length > 0;
  documentsCount.textContent = t("{0} รายการตัวอย่าง", matchingDocuments.length);
  documentsFilterStatus.textContent = matchingDocuments.length
    ? t("แสดง {0}–{1} จาก {2} รายการ", (currentDocumentsPage - 1) * documentsPageSize + 1,
      Math.min(currentDocumentsPage * documentsPageSize, matchingDocuments.length), matchingDocuments.length)
    : t("ไม่มีรายการที่ตรงกับตัวกรองปัจจุบัน");
  if (documentActionFeedback) showDocumentActionFeedback();
  documentsSearchClear.hidden = !documentsSearch.value;
  documentsPagination.hidden = matchingDocuments.length === 0;
  documentsPageStatus.textContent = t("หน้า {0} จาก {1}", currentDocumentsPage, pageCount);
  renderDocumentPageButtons(pageCount);
}

function changeDocumentsPage(page) {
  currentDocumentsPage = page;
  renderDocuments();
  document.querySelector("#documents-results-title").scrollIntoView({ block: "start" });
}

function resetDocumentFilters() {
  documentsSearch.value = "";
  documentsCategory.value = "";
  documentsFormat.value = "";
  currentDocumentsPage = 1;
  renderDocuments();
}

documentsSearch.addEventListener("input", () => { currentDocumentsPage = 1; renderDocuments(); });
documentsCategory.addEventListener("change", () => { currentDocumentsPage = 1; renderDocuments(); });
documentsFormat.addEventListener("change", () => { currentDocumentsPage = 1; renderDocuments(); });
documentsSearchClear.addEventListener("click", () => { documentsSearch.value = ""; currentDocumentsPage = 1; renderDocuments(); documentsSearch.focus(); });
document.querySelector("#documents-reset").addEventListener("click", resetDocumentFilters);
document.querySelector("#documents-empty-reset").addEventListener("click", resetDocumentFilters);

document.querySelector("#documents-results").addEventListener("click", (event) => {
  const actionButton = event.target.closest("[data-document-action]");
  if (!actionButton) return;
  const item = documentRecords.find((record) => record.id === actionButton.dataset.documentId);
  if (!item) return;
  const action = actionButton.dataset.documentAction === "download" ? "ดาวน์โหลด" : "ดูตัวอย่าง";
  documentActionFeedback = { action, title: item.title };
  showDocumentActionFeedback();
});

function showDocumentActionFeedback() {
  const { action, title } = documentActionFeedback;
  documentsFilterStatus.textContent = t("{0}ไม่ได้: “{1}” เป็นข้อมูลจำลองและไม่มีไฟล์แนบ", t(action), t(title));
}

document.addEventListener("site-language-change", () => renderDocuments({ preserveFeedback: true }));
renderDocuments();
