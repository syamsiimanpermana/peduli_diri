const sort = document.querySelector(".sort");
const tabel = document.querySelector(".daftar-catatan");

const keyword = document.querySelector(".search");
const tombol_cari = document.querySelector("#tmbl-search");
const tbody = tabel.tBodies[0];

keyword.addEventListener("keyup", (e) => {
  
  if(keyword.value === ""){
    return;
  }else{
    requestajax();
  }
  // if (e.key === "Enter") {
  //   requestajax();
  // }
});

tombol_cari.addEventListener("click", () => {
  requestajax();
});

function requestajax() {
  let xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      tbody.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "./data/data-cari.php?keyword=" + keyword.value, true);
  xhr.send();
}

function sortTable(table, column, asc = 1) {
  const dirmodifier = asc ? 1 : -1;
  const tbody = table.tBodies[0];
  const rows = Array.from(tbody.querySelectorAll("tr"));

  // sort tiap baris
  const sortrows = rows.sort((a, b) => {
    const aColText = a
      .querySelector("td:nth-child(" + column * 1 + ")")
      .textContent.trim();
    const bColText = b
      .querySelector("td:nth-child(" + column * 1 + ")")
      .textContent.trim();

    return aColText > bColText ? 1 * dirmodifier : -1 * dirmodifier;
  });

  // menetapkan nomer agar tetap berurutan
  rows.map((tr, index) => {
    if(tr.children[0].innerHTML != "data catatan masih kosong"){

      tr.children[0].innerHTML = index + 1;
    }
  });

  while (tbody.firstChild) {
    tbody.removeChild(tbody.firstChild);
  }

  tbody.append(...sortrows);
}

sort.onclick = (e) => {
  e.target.classList.toggle("th-sort-desc");

  if (e.target.classList.contains("th-sort-desc")) {
    sortTable(tabel, 2, false);
  } else {
    sortTable(tabel, 2, true);
  }
};

sortTable(tabel, 2, true);
