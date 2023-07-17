
$("#Tanggal_Kerusakan").flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minuteIncrement: 1,
    defaultDate: new Date()
  });
  
  $("#surat_keluar").flatpickr({
    maxDate: "today"
  });