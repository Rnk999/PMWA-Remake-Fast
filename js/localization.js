// # ระบบแปลภาษา
// โหลดพจนานุกรมและเก็บข้อความต้นฉบับเพื่อสลับภาษาได้
const siteLanguage = (() => {
  const root = document.documentElement;
  const dictionary = JSON.parse(document.querySelector("#site-translations").textContent);
  const switcher = document.querySelector(".language-switch");
  const buttons = [...switcher.querySelectorAll("[data-site-language]")];
  const originalText = new WeakMap();
  const originalAttributes = new WeakMap();
  const attributes = ["alt", "aria-label", "placeholder", "title"];
  const ignored = "script, style, noscript, [lang]:not(html), .material-symbols-rounded";
  const thaiText = /[\u0e00-\u0e7f]/;
  const storageKey = "pmwa-site-language";
  const normalize = (text) => text.trim().replace(/\s+/g, " ");

  // # การค้นหาคำแปล
  // หาคำแปลจากข้อความที่จัดช่องว่างแล้ว และรองรับรูปแบบปีและเวลา
  function english(text) {
    const key = normalize(text);
    if (Object.hasOwn(dictionary, key)) return dictionary[key];
    const year = /^(ปี )?พ\.ศ\. (\d{4})$/.exec(key);
    if (year) return `${year[2]} B.E.`;
    const time = /^(\d{1,2}:\d{2}) น\.$/.exec(key);
    if (time) return time[1];
    return key;
  }

  // # ข้อความแบบมีตัวแปร
  // แทนค่าตัวแปรในข้อความตามภาษาปัจจุบัน
  function text(source, ...values) {
    const message = root.lang === "en" ? english(source) : source;
    return message.replace(/\{(\d+)\}/g, (match, index) => values[index] ?? match);
  }

  // # ข้อความสำหรับค้นหา
  // รวมข้อความต้นฉบับและคำแปลเพื่อจับคู่คำค้นทั้งสองภาษา
  function searchText(...sources) {
    const original = sources.join(" ");
    const translated = sources.map(english).join(" ");
    return `${original} ${translated}`.normalize().toLocaleLowerCase("th");
  }

  // # โหนดข้อความที่แปลได้
  // เลือกโหนดข้อความที่มีเนื้อหาและอยู่นอกองค์ประกอบที่ยกเว้น
  function textNodes(scope) {
    return document.createTreeWalker(scope, NodeFilter.SHOW_TEXT, {
      acceptNode(node) {
        return node.parentElement?.closest(ignored) || !normalize(node.data)
          ? NodeFilter.FILTER_REJECT : NodeFilter.FILTER_ACCEPT;
      }
    });
  }

  // # ข้อความที่ใช้ค้นหาในหน้า
  // เก็บข้อความต้นฉบับและคำแปลจากองค์ประกอบที่กำหนด
  function searchableContent(scope) {
    const nodes = textNodes(scope);
    const phrases = [];
    while (nodes.nextNode()) {
      const node = nodes.currentNode;
      phrases.push(originalText.get(node) ?? node.data);
    }
    return searchText(...phrases);
  }

  // # การแปลเนื้อหา
  // สลับข้อความและแอตทริบิวต์โดยใช้ค่าต้นฉบับเป็นแหล่งอ้างอิง
  function localize(scope) {
    const nodes = textNodes(scope);
    while (nodes.nextNode()) {
      const node = nodes.currentNode;
      const original = originalText.get(node) ?? node.data;
      if (!thaiText.test(original) || english(original) === normalize(original)) continue;
      originalText.set(node, original);
      node.data = root.lang === "en" ? original.replace(/\S[\s\S]*\S|\S/, () => text(original)) : original;
    }

    const attributeSelector = attributes.map((name) => `[${name}]`).join(", ");
    for (const element of scope.querySelectorAll(attributeSelector)) {
      if (element.closest(ignored)) continue;
      const originals = originalAttributes.get(element) ?? new Map();
      for (const name of attributes) {
        const value = element.getAttribute(name);
        if (value === null) continue;
        const original = originals.get(name) ?? value;
        if (!thaiText.test(original) || english(original) === normalize(original)) continue;
        originals.set(name, original);
        element.setAttribute(name, text(original));
      }
      if (originals.size) originalAttributes.set(element, originals);
    }
  }

  const title = document.title;
  const description = document.querySelector('meta[name="description"]');
  const originalDescription = description?.content;

  // # การเปลี่ยนภาษา
  // อัปเดตภาษาของเอกสาร ข้อมูลเมตา ปุ่ม และส่งเหตุการณ์ให้ส่วนอื่น
  function apply(language) {
    root.lang = language;
    document.title = title.split(/( — | \| )/).map((part, index) => index % 2 ? part : text(part)).join("");
    if (description) description.content = text(originalDescription);
    localize(document.body);
    buttons.forEach((button) => button.setAttribute("aria-pressed", String(button.dataset.siteLanguage === language)));
    document.dispatchEvent(new Event("site-language-change"));
  }

  // # ภาษาที่บันทึกไว้
  // อ่านภาษาจากพื้นที่จัดเก็บและใช้ภาษาเริ่มต้นเมื่ออ่านไม่ได้
  function storedLanguage() {
    try {
      return localStorage.getItem(storageKey) === "en" ? "en" : "th";
    } catch {
      return root.lang;
    }
  }

  // # Event Listeners
  // เชื่อมปุ่มเลือกภาษากับการบันทึกและอ่านค่าซ้ำเมื่อกลับมายังหน้า
  buttons.forEach((button) => button.addEventListener("click", () => {
    const language = button.dataset.siteLanguage;
    if (root.lang === language) return;
    try {
      localStorage.setItem(storageKey, language);
    } catch {
      // # การบันทึกภาษา
      // คงภาษาที่เลือกบนหน้าปัจจุบันเมื่อบันทึกข้ามหน้าไม่ได้
    }
    apply(language);
  }));
  apply(storedLanguage());
  switcher.hidden = false;
  window.addEventListener("pageshow", (event) => {
    if (!event.persisted) return;
    const language = storedLanguage();
    if (language !== root.lang) apply(language);
  });

  return { text, searchText, searchableContent, localize };
})();
