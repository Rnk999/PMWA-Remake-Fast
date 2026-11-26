(() => {
  const form = document.querySelector(".open-data-filters");
  const search = document.querySelector("#dataset-search");
  const topic = document.querySelector("#dataset-topic");
  const count = document.querySelector("#dataset-count");
  const empty = document.querySelector("#dataset-empty");
  const cards = Array.from(document.querySelectorAll(".open-data-card"), (card) => ({
    card,
    text: [card.querySelector("h2"), card.querySelector(".open-data-description")]
      .map((element) => element.textContent).join(" ").normalize().toLocaleLowerCase("th")
  }));

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
      ? `พบ ${matches} จาก ${cards.length} ชุดข้อมูล`
      : `แสดงทั้งหมด ${cards.length} ชุดข้อมูล`;
    empty.hidden = matches > 0;
  }

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

  const dialog = document.querySelector("#dataset-dialog");
  const content = document.querySelector("#dataset-dialog-content");

  document.querySelectorAll(".open-data-preview").forEach((button) => {
    button.addEventListener("click", () => {
      const template = document.getElementById(`sample-${button.dataset.preview}`);
      content.replaceChildren(template.content.cloneNode(true));
      dialog.showModal();
    });
  });
})();
