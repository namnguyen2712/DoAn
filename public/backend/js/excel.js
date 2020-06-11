$("#saveAsExcelImport").click(function() {

  let workbook = XLSX.utils.book_new();

  let worksheet_data  = document.getElementById("list-import");

  let worksheet = XLSX.utils.table_to_sheet(worksheet_data);

  workbook.SheetNames.push("BaoCao");
  workbook.Sheets["BaoCao"] = worksheet;

   exportExcelFile(workbook);


});

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "BaoCaoPhieuNhap.xlsx");
}
$("#saveAsExcelOrder").click(function() {

  let workbook = XLSX.utils.book_new();

  let worksheet_data  = document.getElementById("list-order");

  let worksheet = XLSX.utils.table_to_sheet(worksheet_data);

  workbook.SheetNames.push("BaoCao");
  workbook.Sheets["BaoCao"] = worksheet;

   exportExcelFile(workbook);


});

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "BaoCaoHoaDon.xlsx");
}
$("#saveAsExcelProduct").click(function() {

  let workbook = XLSX.utils.book_new();

  let worksheet_data  = document.getElementById("list-product");

  let worksheet = XLSX.utils.table_to_sheet(worksheet_data);

  workbook.SheetNames.push("BaoCao");
  workbook.Sheets["BaoCao"] = worksheet;

   exportExcelFile(workbook);


});

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "BaoCaoHangTonKho.xlsx");
}
